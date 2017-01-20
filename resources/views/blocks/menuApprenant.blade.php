
    <h2>Titre possible</h2>
    <p>Bienvenue dans votre interface d'apprenant , venez ici gerer pas mal de truc</p>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#profil">Profil</a></li>
        <li><a data-toggle="tab" href="#library">Librairie</a></li>
        {{--<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>--}}
    </ul>

    <div class="tab-content">
        <div id="profil" class="tab-pane fade in active">
            <h3>Profil</h3>
            <p>Mettre les infos du profil apprenant, avec formulaire pour modifier infos !</p>
            <ul>
                <li>Avatar</li>
                <li>Ajout infos : stack, git, autres</li>
            </ul>

            <div class="col-sm-4 col-xs-12">
                <h4>Mes infos</h4>
                <ul>
                    <li>Nom : Mon nom</li>
                    <li>Prénom : Mon prénom</li>
                    <li>Adresse mail : email</li>
                    <li>Avatar : img</li>
                    <li>réseaux sociaux aujouté
                        <ul>
                            <li>Stack overflow</li>
                            <li>Git</li>
                            <li>...</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-sm-8 col-xs-12">
                <h4>Modifier mes infos</h4>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea">Example textarea</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                    </div>
                    <fieldset class="form-group">
                        <legend>Radio buttons</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                Option one is this and that&mdash;be sure to include why it's great
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                                Option three is disabled
                            </label>
                        </div>
                    </fieldset>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Check me out
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div id="library" class="tab-pane fade">
            <h3>Librairie</h3>
            <p>Accéder aux ressources du centre de formation</p>
            <p>Affichage liste des resosurces de l'école</p>
            @include('quizzs.create')
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
        <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            @include('quizzs.create')
        </div>
    </div>
