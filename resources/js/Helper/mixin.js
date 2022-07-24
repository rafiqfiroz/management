import { Callbacks } from 'jquery';
import Vue from 'vue'

Vue.mixin({
    methods: {
         CommonImagePreview(event,Image){

            let file = event.target.files[0];
            if(file.size>200000){
                alert('image size long');
            }else{
                let reader = new FileReader();
                reader.onload=event=>{
                    this.form.image = event.target.result;
                }

                reader.readAsDataURL(file);
            }
        }
    },
})