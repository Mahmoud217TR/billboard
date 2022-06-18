<template>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col position-relative">
                <input class="form-control" type="text" id='tags' name="tags[]" @focus="showPredBox()" @blur="hidePredBox()"
                ref="tagSearch" @keyup="search()">
                <div class="prediction-box round p-2" v-if="show">
                    <ul class="list-group">
                        <a href="#" class="list-group-item list-group-item-action fw-bold d-flex justify-content-between" v-if="create"
                        id="predbox-create" @mouseenter="active('predbox-create')" @mouseleave="unActive('predbox-create')">
                            <span>#{{ value }}</span> <span class="text-muted fw-normal">Create Tag</span>
                        </a>
                        <a v-for="(item, index) in items" href="#" class="list-group-item list-group-item-action fw-bold"
                        :id="'predbox-'+index" @mouseenter="active('predbox-'+index)" @mouseleave="unActive('predbox-'+index)">
                            #{{ item }}
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['url'],
        data() {
            return {
                show: false,
                create: false,
                value: '',
                items: [],
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
                this.value = this.$refs.tagSearch.value
                axios.get(this.url,{params: {keyword:this.value}}).then(response =>{
                    this.items = response.data['results'];
                    this.shouldCreate(response.data['match'])
                });
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
        },
    }
</script>
