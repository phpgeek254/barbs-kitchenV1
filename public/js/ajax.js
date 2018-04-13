new Vue({
    el : 'body',

    data: {

    },

    mounted: function() {

    },

    methods : {
    	remove_item: function() {
            axios.get('/add_to_cart/' + id)
        },

    	add_to_cart: function(){

    	}
    }
})