<div class="row home-block">
    <div class="col-xs-12 col-sm-6 col-md-4 block-task" id="home-profil">
        <div class="classWithPad">
            <div><h2>Profil</h2></div>
            <div><i class="fa fa-user" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 block-task" id="home-phonebook">
        <div class="classWithPad">
            <div><h2>Annuaire</h2></div>
            <div><i class="fa fa-address-book" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 block-task" id="home-group">
        <div class="classWithPad">
            <div><h2>Groupes</h2></div>
            <div><i class="fa fa-users" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 block-task" id="home-course">
        <div class="classWithPad">
            <div><h2>Cours</h2></div>
            <div><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 block-task" id="home-quizz">
        <div class="classWithPad">
            <div><h2>Quizz</h2></div>
            <div><i class="fa fa-question-circle" aria-hidden="true"></i></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 block-task" id="home-create-account">
        <div class="classWithPad">
            <div><h2>Créer un compte</h2></div>
            <div><i class="fa fa-user-plus" aria-hidden="true"></i></div>
        </div>
    </div>
</div>

<style>
    .home-block{
        padding-top: 20px;
    }
    .block-task{
        height: 270px;
    }
    .block-task h2{
        font-size: 20px;
        padding: 10px;
    }
    .classWithPad{
        height: 90%;
        opacity: 0.4;
    }

    .classWithPad div:first-of-type{
        border: 4px solid white;
        border-radius: 0 15px 0 0;

    }
    #home-profil .classWithPad div:first-of-type{
        background-color: orange;
    }
    #home-phonebook .classWithPad div:first-of-type{
        background-color: dodgerblue;
    }
    #home-group .classWithPad div:first-of-type{
        background-color: firebrick;
    }
    #home-course .classWithPad div:first-of-type{
        background-color: mediumseagreen;
    }
    #home-quizz .classWithPad div:first-of-type{
        background-color: hotpink;
    }
    #home-create-account .classWithPad div:first-of-type{
        background-color: mediumpurple;
    }

    .classWithPad div:last-of-type{
        border: 4px solid white;
        border-top: 0;
        height: 200px;
        display: flex;
        cursor: pointer;
    }
    #home-profil .classWithPad div:last-of-type{
        background-color: orange;
    }
    #home-phonebook .classWithPad div:last-of-type{
        background-color: dodgerblue;
    }
    #home-group .classWithPad div:last-of-type{
        background-color: firebrick;
    }
    #home-course .classWithPad div:last-of-type{
        background-color: mediumseagreen;
    }
    #home-quizz .classWithPad div:last-of-type{
        background-color: hotpink;
    }
    #home-create-account .classWithPad div:last-of-type{
        background-color: mediumpurple;
    }

    .classWithPad div:last-of-type i{
        margin: auto;
        color: white;
        font-size: 7em;
    }
    .classWithPad:hover{
        opacity: 1;
        transition: 0.5s;
    }
</style>