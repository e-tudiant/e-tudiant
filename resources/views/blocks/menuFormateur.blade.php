
<h2>Titre possible</h2>
<p>Bienvenue dans votre interface de formateur , venez ici gerer pas mal de truc</p>

<ul class="nav nav-tabs">
    <li class="active"><a href="#accueil">Accueil</a></li>
    <li><a href="#profil">Profil</a></li>
    <li><a href="#library">Librairie</a></li>
    <li><a href="#course">Mes cours</a></li>
    <li><a href="/quizz/#profil">Mes Quizz</a></li>
    <li><a href="#class">Salle de classe</a></li>
</ul>

<div class="tab-content">
    <div id="accueil" class="tab-pane fade in active">
        <div id="profil" class="tab-pane fade in active">
            <h3>Accueil</h3>
            <p>Ceci est l'accueil quand vous arrivez sur votre dashboard</p>
        </div>
    </div>
    <div id="profil" class="tab-pane fade">
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

        <div class="col-sm-8">
            <h4>Ressources présentes</h4>
            <p>Accéder aux ressources du centre de formation</p>
            <p>Affichage liste des resosurces de l'école</p>
        </div>
        <div class="col-sm-4">
            <h4>Ajouter des ressources</h4>
            <form>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
    <div id="course" class="tab-pane fade">
        <h3>Mes cours</h3>
        <p>Bienvenue dans la page de création de cours</p>
        <div class="col-sm-4">
            <h4>Liste de mes cours</h4>
            <ul>
                <li>cours php</li>
                <li>cours Js</li>
                <li>cours html</li>
                <li>cours css</li>
                <li>cours node</li>
            </ul>
        </div>
        <div class="col-sm-8">
            <h4>Créer un cours</h4>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom du cours</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom du cours">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea">Descriptif</label>
                    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ajouter des sliders</label>
                    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                </div>
                <button type="submit" class="btn btn-primary">Générer mon cours</button>
            </form>
        </div>
    </div>
    <div id="class" class="tab-pane fade">
        <h3>Ma salle de classe</h3>
        <p>Pour créer votre salle de classe, veuillez sélectionner votre cours dans votre liste de cours, puis de sélectionner la ou les sessions qui suivront celui-ci, puis cliquez sur lancer mon cours.<br>Une fois votre cours lancé vous pourrez visualiser les élèves présents et absents</p>
        <form>

                <h4>Vos cours disponibles</h4>
            <div class="form-group col-sm-6">
                <label for="exampleSelect2">Example multiple select</label>
                <select multiple class="form-control" id="exampleSelect2">
                    <option>php</option>
                    <option>js</option>
                    <option>html</option>
                    <option>node</option>
                    <option>symfony</option>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleSelect2">Example multiple select</label>
                <select multiple class="form-control" id="exampleSelect2">
                    <option>dev7</option>
                    <option>dev8</option>
                    <option>as</option>
                    <option>it</option>
                    <option>cared</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary center">Générer mon cours</button>
        </form>
    </div>
</div>
