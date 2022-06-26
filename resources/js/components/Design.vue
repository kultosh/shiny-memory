<template>
    <div>
        <h2 class="text-secondary text-center mt-2 mb-5">Addition</h2>
        <div v-if="calculatedValue != 100">
            <div class="row justify-content-md-center">
                <div class="col-md-3" v-for="(box,index) in boxes" :key="box.id">
                    <input type="text" size="2" style="line-height:70px;width: 100px; float: left" class="text-center input-lg form-control text-white" v-model="box.value" :class="box.value ? `bg-success` : `bg-primary`" readonly @click="selectBox(index)"><span class="col-1 display-4" style="padding-left: 60px" v-if="box.id < 4">{{operators[index].type}}</span>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-md-3 offset-2 mt-4">
                    <h4 class="text-secondary">{{calculatedValue}}</h4>
                </div>
            </div>

            <div class="row justify-content-md-center mt-5">
                <div class="col-1 p-3 border text-white text-center" v-for="(list) in lists" :key="list.value" v-show="!list.selected" :class="list.selected ? `bg-success` : `bg-secondary`"><span @click="selectAnswer(list.value)" :style="list.selected ? 'cursor:not-allowed' : 'cursor:pointer'">{{list.value}}</span></div>
            </div>
        </div>
        <div v-else>
            <h2 class="text-success text-center">Congratulation!!</h2>
            <p><h1 class="text-success text-center">100</h1></p>
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Play Again</button>
                </div>
                <div class="col-md-6">
                    <span style="float:right"><button class="btn btn-warning">Next Level</button></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'lists': [],
                'boxes': [
                    {id: 1, value: "", selected: false},
                    {id: 2, value: "", selected: false},
                    {id: 3, value: "", selected: false},
                    {id: 4, value: "", selected: false}
                ],
                'operators': [
                    {id: 1, type: '+'},
                    {id: 2, type: '+'},
                    {id: 3, type: '+'}
                ],
                chooseOneClick: true,
                calculatedValue: 0
            }
        },
        created() {
            const slug = 'one';
            axios.get(`api/level/${slug}`).then(res => {
                this.lists = res.data.data.list;
                this.operators = res.data.data.operator.operators;
            });
        },
        methods: {
            selectAnswer(param) {
                this.boxes.find((box,index) => {
                    if(box.value == "") {
                        box.value = param;
                        this.selectedList(param);
                        if(index === 3) {
                            this.calculatedValue = eval(this.boxes[0].value+this.operators[0].type+this.boxes[1].value+this.operators[1].type+this.boxes[2].value+this.operators[2].type+this.boxes[3].value);
                        }   
                        return true;
                    }
                })
            },
            selectBox(index) {
                var i = index;
                for (i; i < 4; i++) 
                {
                    this.lists.find(list => {
                        if(list.value == this.boxes[i].value)
                        {
                            return list.selected = false;
                        }
                    })
                    this.boxes[i].value = "";
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
            }
        }
    }
</script>