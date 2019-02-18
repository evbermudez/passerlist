<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="card card-default mt-3">
                    <div class="card-header">
                        <h5 class="float-left">The Bonus Table</h5>
                        <h5><a href="/" class="float-right badge badge-success">Main Test Page</a></h5>
                    </div>

                    <div class="card-body">

                        

                        

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>School</th>
                                    <th>No. of Passer(s)</th>
                                </tr>
                            </thead>
                            <tbody v-for="b in bonus" v-bind:key="b.id">
                                <tr>
                                    <td>{{ b.school }}</td>
                                    <td>{{ b.total }}</td>
                                </tr>
                                <!--<tr>
                                    <td colspan="4" class="text-center">No results</td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Bonus Component mounted.')
        },
        data() {
            return {
                bonus: [],
                bonus: {
                    school: '',
                    total: '',
                },
                bonus_id: '',
            }
        },

        created() {
            this.fetchBonus();
        },

        methods: {
            fetchBonus(page_url){
                let vm = this;
                page_url = page_url || '/api/passer/summary';
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.bonus = res;
                        console.table(res);
                    })
                    .catch(err => console.log(err));
            }
        }
    }
</script>
