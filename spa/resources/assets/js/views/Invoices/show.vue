<template>
    <div class="panel" v-if="show">
        <div class="panel-heading">
            <span class="panel-title">{{model.number}}</span>
            <div>
                <router-link to="/invoices" class="btn">Back</router-link>
                <router-link to="/invoices/${model.id}/edit" class="btn">Edit</router-link>
                <button class="btn btn-error">Delete</button>
            </div>
        </div>
        <div class="panel-body">
            <div class="document">
                <div class="row">
                    <div class="col-6">
                        <strong>To:</strong>
                        <div>
                            <span>{{model.customer.text}}</span>
                            <pre>{{model.customer.address}}</pre>
                        </div>
                    </div>
                    <div>
                        <div class="col-6 col-offset-12">
                            <table class="document-summary">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <span class="document-title">Invoice</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Number</td>
                                        <td>{{model.number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td>{{model.date}}</td>
                                    </tr>
                                    <tr>
                                        <td>Due Date</td>
                                        <td>{{model.due_date}}</td>
                                    </tr>
                                    <tr v-if="model.reference">
                                        <td>Reference</td>
                                        <td>{{model.reference}}</td>    
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue'
    import {get, byMethod} from '../../lib/api'
    
    export default {
        data () {
            return {
                show: false,
                model: {
                    items: [],
                    customer: {} 
                }
            }
        },

        beforeRouteEnter(to, from, next) {
            get('/api/invoices/${to.params.id}')
                .then((res) => {
                    next(vm => vm.setData(res))
                })
        },

        beforeRouteUpdate(to, from, next) {
            this.show = false
            get('/api/invoices/${to.params.id}')
                .then((res) => {
                    this.setData(res)
                    next()
                })
        },

        methods: {
            setdata(res) {
                Vue.set(this.$date, 'model', res.data.model)
                this.show = true
            }
        }


    }
</script>