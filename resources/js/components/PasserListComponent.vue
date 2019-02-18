<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="card card-default mt-3">
                    <div class="card-header">
                        <h5 class="float-left">The Deserving Passers</h5>
                        <h5><a href="bonus" class="float-right badge badge-success">Bonus Page</a></h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">

                            <div class="form-group form-inline">
                                <input type="text" id="searchbar" v-model="keyword" placeholder="Search here" class="col-sm-6 form-control" value="" />

                                <select id="searchfilter" v-model="filter" class="col-sm-4  form-control">
                                    <option value="examinee" selected>Examinee</option>
                                    <option value="eligibility">Eligibility</option>
                                    <option value="school">School</option>
                                    <option value="division">Division</option>
                                </select>

                                <button class="btn btn-primary col-sm-2  form-control" type="button" id="searchbutton" v-on:click="fetchPassersSearch">Search</button>        
                            </div>

                            <div class="form-group ">

                                <button class="btn btn-primary " type="button" data-toggle="collapse" data-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm" v-on:click="toggleFormOpen">
                                    {{ button.text }}
                                </button>

                                                        

                            </div>

                            <div class="collapse" id="collapseForm">
                                <div class="card card-body bg-primary">
                                    <form @submit.prevent="addPasser" class="mb-3">
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Examinee" v-model="passer.examinee">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Eligibility" v-model="passer.eligibility">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="School" v-model="passer.school">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Division" v-model="passer.division">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success btn-block">Save</button>
                                    </form>
                                    <button @click="clearForm()" class="btn btn-danger btn-block">Cancel</button>
                                </div>
                            </div>
                        </div>

                        

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Examinee</th>
                                    <th>Eligibility</th>
                                    <th>School</th>
                                    <th>Division</th>
                                </tr>
                            </thead>
                            <tbody v-for="passer in passers" v-bind:key="passer.id">
                                <tr>
                                    <td>{{ passer.examinee }}</td>
                                    <td>{{ passer.eligibility }}</td>
                                    <td>{{ passer.school }}</td>
                                    <td>{{ passer.division }}</td>
                                </tr>
                                <!--<tr>
                                    <td colspan="4" class="text-center">No results</td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPassers(pagination.prev_page_url)">Previous</a></li>

                                <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                            
                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchPassers(pagination.next_page_url)">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Passer List Component mounted.')
        },
        data() {
            return {
                passers: [],
                passer: {
                    id: '',
                    examinee: '',
                    eligibility: '',
                    school: '',
                    division: '',
                },
                passer_id: '',
                pagination: {},
                keyword: '',
                filter: 'examinee',
                button: {
                text: 'Add Passer'
                },
                seen: true
            }
        },

        created() {
            this.fetchPassers();
        },

        methods: {
            fetchPassers(page_url){
                let vm = this;
                page_url = page_url || '/api/passers';
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.passers = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },
            fetchPassersSearch(page_url){
                let vm = this;
                console.log(vm.keyword);
                console.log(vm.filter);
                if(vm.keyword === "" || vm.filter === ""){
                    this.fetchPassers();
                } else {
                    page_url = '/api/passer/' + vm.keyword + '/filter/' + vm.filter;
                    fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.passers = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));

                }
                
            },
            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };
                this.pagination = pagination;
            },

            addPasser() {
                fetch('api/passer', {
                    method: 'post',
                    body: JSON.stringify(this.passer),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.clearForm();
                    alert('Passer Added');
                    this.fetchPassers();
                })
                .catch(err => console.log(err));
            },

            clearForm() {
                this.passer.id = null;
                this.passer.passer_id = null;
                this.passer.examinee = '';
                this.passer.eligibility = '';
                this.passer.school = '';
                this.passer.division = '';
            },

            toggleFormOpen: function() {
                this.seen = !this.seen;
                this.button.text = this.seen ? 'Add Passer' : 'Hide Form';
            }
        }
    }
</script>
