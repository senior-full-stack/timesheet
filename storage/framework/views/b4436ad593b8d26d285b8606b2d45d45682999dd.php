
<style media="screen">
    .container.top-container {
        width: 100%;
    }

    .online {
        color: #32CD32;
    }

    .box-style {
        height: 40%;
        position: fixed;
        overflow: hidden;
        z-index: 1;
        /* top: 0; */
        bottom: 0;
        /* padding-top: 50px; */
    }
    .panel-default > .panel-heading{
        border-top: solid 3px #3c8dbc;
    }
    .panel-body{        
        height: calc(100% - 50px);
        border-left: solid 1px darkgray;
        border-bottom: solid 1px darkgray;
        overflow: hidden auto;
    }
    .panel-body > .list-group{
        margin-bottom: 0;
    }
    .box-left-side {
        margin-right: 2em;
        right: 0;
        width: 18em;
    }

    .box-right-side {
        right: 20em;
        width: 20em;
        /* width: calc(100vw - 18em); */
    }

    .chat_box {
        width: 20em;
        padding: 3px 0 1px;
        position: fixed;
        /* top: 48px; */
        bottom: 0;
        right: 20em;
        height: 40%;
    }

    .direct-chat-primary {
        height: calc(100% - 48px);
    }

    .direct-chat .box-body {
        height: calc(100% - 101px);
        background: aliceblue;
    }

    .direct-chat-messages {
        height: 100%;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="chatApp">
            <div class="panel panel-default box-style box-left-side">
                    
                    <div class="box-tools pull-right"><button type="button" data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button> </div>
                <div class="panel-heading">Chats</div>
                
                
                <div class="panel-body" style="padding:0px;">
                    <ul class="list-group">
                        <li class="list-group-item" v-bind:class="{ active:chatList.isActive }" v-for="chatList in chatLists" 
                        style="cursor: pointer;" @click="chat(chatList)">
                            {{ chatList.fullname }}
                            <i class="fa fa-circle pull-right" v-bind:class="{'online': (chatList.online=='Y')}"></i>
                            <span class="badge" v-if="chatList.msgCount !=0">{{ chatList.msgCount }}</span>
                        </li>
                        <li class="list-group-item" v-if="socketConnected.status == false">{{ socketConnected.msg }}</li>
                    </ul>
                </div>
            </div>
            <div id="chat_box_container" class="box-style box-right-side"></div>
        </div>
    </div>
    <div class="row">
            
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".btn-box-tool").click(function(){
            // console.log($("#chat_box_container").css("display"))
            
            if($(".panel-body").css("display")=="none"){
                $("#chat_box_container").show();
                $(".panel-body").show();
                $(".box-left-side").height(box_height);
            }else{
                $("#chat_box_container").hide();
                $(".panel-body").hide();
                box_height=$(".box-left-side").height();
                $(".box-left-side").height("30px");
            }
        });
    });
</script>


<?php /**PATH E:\Laravel\timesheet\resources\views/chat.blade.php ENDPATH**/ ?>