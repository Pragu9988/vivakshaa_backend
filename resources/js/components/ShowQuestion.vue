<template>
    <a v-for="question in questions">
        {{ question.title}}
    </a>

</template>

<script>
export default {
    data: function() {
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

        }
    }
}
</script>