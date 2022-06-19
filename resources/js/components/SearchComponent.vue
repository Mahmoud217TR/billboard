<template>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col position-relative">
                <input v-for="(tag) in tagList" id='tags' name="tags[]" hidden type="text" :value="tag.id">
                <input class="form-control" type="text" @focus="showPredBox()" @blur.="hidePredBox()" id="tag-input"
                ref="tagSearch" @keyup="search()">
                <div class="prediction-box round p-2" v-if="show">
                    <ul class="list-group">
                        <a href="#" class="list-group-item list-group-item-action fw-bold d-flex justify-content-between" v-if="create"
                        id="predbox-create" @mouseenter="active('predbox-create')" @mouseleave="unActive('predbox-create')"
                        @mousedown="createTag()">
                            <span>#{{ value }}</span> <span class="text-muted fw-normal">Create Tag</span>
                        </a>
                        <a v-for="(item, index) in items" href="#" class="list-group-item list-group-item-action fw-bold"
                        :id="'predbox-'+index" @mouseenter="active('predbox-'+index)" @mouseleave="unActive('predbox-'+index)"
                        @mousedown="addTag(index)">
                            #{{ item }}
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="my-1">
                    <a href="#" class="fw-bold me-1 d-block unstyled text-primary" v-for="(tag) in tagList" 
                    @click.prevent="removeTag(tag.id)">
                        {{tag.name}}×
                    </a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['searchUrl','addUrl', 'oldTags'],
        mounted() {
            const oldTagsObject = JSON.parse(this.oldTags);
            this.pushOldTagsToTagList(oldTagsObject);
        },
        data() {
            return {
                show: false,
                create: false,
                value: '',
                items: [],
                tagList: [],
            }
        },
        methods: {
            showPredBox(){
                this.show = true;
            },

            hidePredBox(){
                this.show = false;
            },

            active(id){
                this.addClassToElement(this.getElement(id), 'active');
            },

            unActive(id){
                this.removeClassToElement(this.getElement(id), 'active');
            },

            addClassToElement(element, wantedClass){
                element.classList.add(wantedClass);
            },

            removeClassToElement(element, wantedClass){
                element.classList.remove(wantedClass);
            },

            getElement(id){
                return document.getElementById(id);
            },

            search(){
                this.value = this.$refs.tagSearch.value.toLowerCase()
                console.log(this.getTagsId())
                axios.get(this.searchUrl,{params: {keyword:this.value, exclude: this.getTagsId()}}).then(response =>{
                    this.items = response.data['results'];
                    this.shouldCreate(response.data['match'])
                });
            },

            getTagsId(){
                return this.tagList.map(tag => tag.id)
            },

            shouldCreate(condition){
                if(condition){
                    this.disableCreate()
                }else{
                    this.enableCreate()
                }
            },

            disableCreate(){
                this.create = false;
            },

            enableCreate(){
                this.create = true;
            },

            createTag(){
                axios.post(this.addUrl,{name: this.value}).then(response => {
                    this.addToTagList(response.data['id'], response.data['name']);
                });
                this.clearItemsAndInput();
            },

            addTag(index){
                this.addToTagList(index, this.items[index]);
                this.clearItemsAndInput();
            },

            clearItemsAndInput(){
                this.items = [];
                this.$refs.tagSearch.value = ""
                this.value = ''
                this.disableCreate()
            },

            removeTag(index){
                this.tagList = this.tagList.filter(tag => tag.id !== index);
            },

            pushOldTagsToTagList(oldTagsObject){
                for(const id in oldTagsObject){
                    this.addToTagList(id, oldTagsObject[id]);
                }
            },

            addToTagList(id, name){
                this.tagList.push({id: id, name: name});
            }

        },
    }
</script>
