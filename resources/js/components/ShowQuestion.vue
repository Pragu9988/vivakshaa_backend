<template>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col-xl-4 stretched-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">Filters</h3>
                        <h6 class="card-title mt-4">Faculty</h6>
                        <div class="form-group border border-light p-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Management
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Science
                                </label>
                            </div>
                        </div>

                        <h6 class="card-title mt-4">Program</h6>
                        <div class="form-group border border-light p-2" v-for="program in programs">
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    {{program.name}}
                                    </label>
                                </div>
                        </div>

                        <h6 class="card-title mt-4">Semester</h6>
                        <div class="form-group border border-light p-2">

                        </div>

                        <h6 class="card-title mt-4">Courses</h6>
                        <div class="form-group border border-light p-2">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xl-8 stretched-card">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <h4 class="mb-3 mb-md-0">Search Results</h4>
                    </div>
                    <div class="d-flex align-items-start flex-wrap text-nowrap">
                        <div class="form-group mr-2">
                        <select class="form-control form-control-sm mb-3">
                            <option selected disabled hidden>Year All</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                        <div class="form-group  mr-2">
                        <select class="form-control form-control-sm mb-3">
                            <option selected disabled hidden>Semester Type</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                        <div class="form-group  mr-2">
                        <select class="form-control form-control-sm mb-3">
                            <option selected disabled hidden>Exam Type</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        </div>
                        <button type="button" class="btn btn-success btn-icon-text btn-sm">
                        <i class="btn-icon-prepend" data-feather="filter"></i>
                        Filter
                        </button>
                    </div>
                </div>
                <div class="card mb-4">
                    <a class="list-item" v-for="question in questions">
                    { question.title }
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            questions: [],
            courses: [],
            semesters: [],
            programs: []
        }
    },

    mounted() {
        this.loadQuestions();
        this.loadCourses();
        this.loadSemesters();
        this.loadPrograms();
    },

    methods: {
        loadQuestions: function() {
            //loadAPI
            axios.get('/api/questions')
            .then((response) => {
                this.questions = response.data.data;
                console.log(this.questions);
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        loadCourses: function() {

        },

        loadSemesters: function() {

        },

        loadPrograms: function() {
            axios.get('/api/programs')
            .then((response) => {
                this.programs = response.data.data;
                console.log(this.programs);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
}
</script>