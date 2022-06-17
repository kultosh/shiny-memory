<template>
    <div>
        <h2 class="text-secondary text-center mt-2 mb-5">Multiple Operator</h2>
        <div class="row justify-content-md-center">
            <div class="col-md-3" v-for="(box,index) in boxes" :key="box.id">
                <input type="text" size="2" style="line-height:70px;width: 100px; float: left" class="text-center input-lg form-control text-white" v-model="box.value" :class="box.value ? `bg-success` : `bg-primary`" readonly @click="selectBox(index)"><span class="col-1 display-4" style="padding-left: 60px" v-if="box.id < 4">{{operators[index].value}}</span>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-3 offset-2 mt-4">
                <h4>{{calculatedValue}}</h4>
            </div>
        </div>

        <div class="row justify-content-md-center mt-5">
            <div class="col-1 p-3 border text-white text-center" v-for="(list) in lists" :key="list.id" v-show="!list.selected" :class="list.selected ? `bg-success` : `bg-secondary`"><span @click="selectAnswer(list.value)" :style="list.selected ? 'cursor:not-allowed' : 'cursor:pointer'">{{list.value}}</span></div>
        </div>
    </div>
</template>

<script>
    import Calculation from './Calculation.vue';
    export default {
        components: {
            Calculation,
        },
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
                'operators': [
                    {id: 1, value: '+'},
                    {id: 2, value: '-'},
                    {id: 3, value: '*'}
                ],
                chooseOneClick: true,
                calculatedValue: 0
            }
        },
        methods: {
            selectAnswer(param) {
                this.boxes.find((box,index) => {
                    if(box.value == "") {
                        box.value = param;
                        this.selectedList(param);
                        this.calculateValue(index, param);
                        return true;
                    }   
                })
            },
            selectBox(index) {
                var i = index;
                var j = 0;
                for (i; i < 4; i++) 
                {
                    this.lists.find(list => {
                        if(list.value == this.boxes[i].value)
                        {
                            return list.selected = false;
                        }
                    })
                    this.boxes[i].value = "";
                }
                
                if(index !== 0) {
                    for (j; j < index; j++) 
                    {
                        this.calculateValue(j, this.boxes[j].value);
                    }
                } else {
                   this.calculatedValue = 0; 
                }
            },
            selectedList(param) {
                this.lists.find(list => {
                    if(list.value == param) {
                        list.selected = true;
                        return true;
                    }   
                })
            },
            calculateValue(index, selectedValue) {
                if(index > 0) {
                    switch(this.operators[index-1].value)
                    {
                        case '+':
                            return this.calculatedValue = this.calculatedValue + selectedValue;
                        case '-':
                            return this.calculatedValue = this.calculatedValue - selectedValue;
                        case '*':
                            return this.calculatedValue = this.calculatedValue * selectedValue;
                        case '/':
                            return this.calculatedValue = this.calculatedValue / selectedValue;
                        
                    }
                } else {
                    this.calculatedValue = selectedValue;
                }
            }
        }
    }
</script>