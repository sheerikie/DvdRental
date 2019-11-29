<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome To Zeraki Stores</div>
                    <img class="img" src="http://pngimg.com/uploads/cd_dvd/cd_dvd_PNG9074.png" responsive>
                    <div class="card-body">
                      <h3>Manage Your Dvd Library With Ease</h3>
                    <div class="buttons" > 
           
              
        </div> 
    </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
.card{
    background: steelblue;
}
.img{
    width:100px;
    margin:auto
}
.buttons{
    margin: auto;
     text-align: center;
}
</style>