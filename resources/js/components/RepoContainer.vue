<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body" v-show="github_token">
                        <h4 v-text="github_token"></h4>
                        <div v-if="!loading_repositories">
                            Load repositories
                        </div>
                        <div v-if="loading_repositories">
                            Loading repositories ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                github_token: false,
                loading_repositories: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
