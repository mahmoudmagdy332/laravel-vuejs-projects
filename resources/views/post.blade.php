<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('js/vue-resource.min.js') }}"></script>
    <link href="{{ asset('fontawesome-free-6.0.0-web/css/all.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-8">
            <form  @submit.prevent="addPost()"  method="post" >
                <div class="form-group m-4" >

                    <textarea type="text" required v-model="description" class="form-control mb-2"  name="description" style="height: 100px" ></textarea>
                    <input type="submit" class="btn btn-primary" value="post" >
                </div>
            </form>
            <div v-for="(post,i) in posts  " class="m-4">
                <h3># @{{ i+1 }} : @{{post.description}}</h3>

            </div>
            <button class="btn btn-secondary "  :class="h" @click="getPosts()" style="width: 100%;padding: 7px;font-size: 20px">load more</button>
        </div>

    </div>
</div>
</div>
</body>
</html>
<script>
    // import VueResource from 'vue-resource'
    // vue.use(VueResource)
    var app = new Vue({
        'el':'#app',
        'data':{
            'description':'',
            'posts':[],
            'h':'hidden',

        },
        'methods':{

            addPost(){
                this.posts.unshift({'description':this.description});
                axios.post('http://127.0.0.1:8000/post',{
                    description:JSON.stringify(this.description),

                }).then(function (data){


                }).catch(error=>{

                })
                this.description='';

            },more(){

            },
            getPosts(){

                // axios.get('http://127.0.0.1:8000/get_posts',{
                //     l:JSON.stringify(this.posts.length),
                //
                // }).then(response => (console.log(response.data)));

                this.$http.get('http://127.0.0.1:8000/get_posts/'+this.posts.length).then(response => {

                    // get body data

                    // this.posts.unshift(response.body);
                    console.log(response.body);
                    for(post in response.body){
                        this.posts.push(response.body[post]);
                    }
                    if (response.body.length < 5){
                      this.h ='hidden';
                    }


                }, response => {
                    // error callback
                });

            },


        },
        'created':function (){
            this.getPosts();

        }
    });

</script>
