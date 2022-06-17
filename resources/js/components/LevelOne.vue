<template>
    <div>
        <h2 class="text-secondary text-center mt-2 mb-5">Level One</h2>
        <div class="row justify-content-md-center">
            <div class="col-md-3" v-for="(box) in boxes" :key="box.id">
                <input type="text" size="2" style="line-height:70px;width: 100px; float: left" class="text-center input-lg form-control text-white" v-model="box.value" :class="box.value ? `bg-success` : `bg-primary`" readonly @click="selectBox(box.id,box.value)"><span class="col-1 display-4" style="padding-left: 60px" v-if="box.id < 4">+</span>
            </div>
        </div>

        <div class="row justify-content-md-center mt-5">
            <div class="col-1 p-3 border text-white text-center" v-for="(list) in lists" :key="list.id" :class="list.selected ? `bg-success` : `bg-secondary`"><span @click="selectAnswer(list.id)" :style="list.selected ? 'cursor:not-allowed' : 'cursor:pointer'">{{list.value}}</span></div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'lists': [
                    {id: 1, value: 1, selected: false},
                    {id: 2, value: 2, selected: false},
                    {id: 3, value: 3, selected: false},
                    {id: 4, value: 4, selected: false},
                    {id: 5, value: 5, selected: false},
                    {id: 6, value: 6, selected: false},
                    {id: 7, value: 7, selected: false},
                    {id: 10, value: 10, selected: false}
                ],
                'boxes': [
                    {id: 1, value: "", selected: false},
                    {id: 2, value: "", selected: false},
                    {id: 3, value: "", selected: false},
                    {id: 4, value: "", selected: false}
                ],
                'symbols': [
                    {id: 1, value: '+'},
                    {id: 2, value: '+'},
                    {id: 3, value: '+'}
                ],
                chooseOneClick: true
            }
        },
        methods: {
            selectAnswer(param) {
                if(!this.chooseOneClick) {
                    this.boxes.find(box => {
                        if(box.selected === true) {
                            const previousValue = box.value;
                            box.value = param;
                            box.selected = false;
                            this.lists.find(list => {
                                if(list.value == previousValue) {
                                    list.selected = false;
                                    return true;
                                }   
                            })
                            this.selectedList(param);
                        }
                    });
                    this.chooseOneClick = true;
                } else {
                    this.boxes.find(box => {
                        if(box.value == "") {
                            box.value = param;
                            this.selectedList(param);
                            return true;
                        }
                    })
                }
            },
            selectBox(id,boxValue) {
               if(!this.chooseOneClick) {
                    var tempValue = '';
                    this.boxes.find((box) => {
                        if(box.selected) {
                            tempValue = box.value;
                            box.value = boxValue;
                            return true;
                        }
                    });
                    this.boxes.find(box => {
                        if(box.id == id) {
                            box.value = tempValue;
                        }
                    })
                    this.chooseOneClick = true;
               } else {
                this.boxes.find(box => {
                    box.selected = (box.id === id) ? true : false
                });
                this.chooseOneClick = false;
               }
            },
            selectedList(param) {
                this.lists.find(list => {
                    if(list.value == param) {
                        list.selected = true;
                        return true;
                    }   
                })
            }
        }
    }
</script>