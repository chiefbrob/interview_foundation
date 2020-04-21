<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body" v-show="g_token">
                        <div>
                            <h5>Github Token: <span v-text="g_token"></span></h5>
                        </div>
                        <div v-if="!loading_repositories">
                            <b-button  variant="success" :disabled="loading_repositories" v-on:click="getGitHubRepositories">Get Starred Repositories</b-button>
                            <b-button  variant="danger" :disabled="loading_repositories" v-on:click="deleteGitHubToken">Delete Token</b-button>
                        </div>
                        <div v-if="loading_repositories">
                            Loading repositories ...
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>
                                    <span v-text="repositories.length"></span> Repositories
                                </h4>
                            </div>
                            <div class="card col-md-6" v-for="repo in repositories">
                                <div class="card-header" v-text="repo.name"></div>
                                <div class="card-body" v-text="repo.description"></div>
                                <div class="card-footer">
                                    <b-button :href="repo.html_url" variant="primary" target="_blank">View on Github</b-button>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="card-body" v-show="!g_token">
                        <h4>Add Github Token</h4>
                        <b-form-input v-model="input_github_token" placeholder="Enter your github token"></b-form-input>
                        <b-button variant="outline-primary" :disabled="input_github_token.length < 5" v-on:click="saveGithubToken">Save</b-button>
                        <br>
                        <hr>
                        <b-button href="https://github.com/settings/tokens" variant="link" target="_blank">No Token? Click here to learn how to make token</b-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['github_token'],
        data() {
            return {
                g_token: this.github_token,
                loading_repositories: false,
                input_github_token: '',
                repositories: []
            };
        },
        mounted() {
            //console.log('Dashboard Container Component Mounted');
        },
        methods: {
            saveGithubToken(e) {
                e.preventDefault();
                if (this.input_github_token == '')
                    return;
                let currentObj = this;
                axios.post('/save-github-token', {
                    github_token: currentObj.input_github_token
                })
                .then(function (response) {
                    currentObj.g_token = currentObj.input_github_token;
                    currentObj.input_github_token = '';
                    alert("Github token saved");
                })
                .catch(function (error) {
                    alert('An error occurred saving your token');
                });
            },
            getGitHubRepositories(e) {
                e.preventDefault();
                let currentObj = this;
                currentObj.loading_repositories = true;

                axios.get('/repositories/starred')
                .then(function (response) {
                    if(response.status == 200 && response.data.length > 0)
                    {
                        currentObj.repositories = response.data;
                    }
                    else
                    {
                        alert('Failed to get Repositories. Please Try again!');
                    }
                    currentObj.loading_repositories = false;
                    
                })
                .catch(function (error) {
                    currentObj.loading_repositories = false;
                    alert('An error occurred. Please Try again!');
                });
            },
            deleteGitHubToken(e) {
                e.preventDefault();
                let currentObj = this;
                currentObj.loading_repositories = true;

                axios.post('/delete-github-token')
                .then(function (response) {
                    currentObj.g_token = false;
                    currentObj.input_github_token = '';
                    currentObj.loading_repositories = false;
                    currentObj.repositories = [];
                    alert("Github token deleted");                    
                })
                .catch(function (error) {
                    alert('An error occurred deleting token');
                    currentObj.loading_repositories = false;
                });

            }
        }
    }
</script>
