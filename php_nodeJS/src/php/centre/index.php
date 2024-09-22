<article class="card rounded-4 border-primary bg-shadow shadow-lg">
    <section class="card-header p-3">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4 text-center">
            <div><a onclick="addPersonne(2)" href="#" class="btn btn-primary shadow-lg">Ajouter 02 personnes</a></div>
            <div><a onclick="addPersonne(4)" href="#" class="btn btn-primary shadow-lg">Ajouter 04 personnes</a></div>
            <div><a onclick="addPersonne(6)" href="#" class="btn btn-primary shadow-lg">Ajouter 06 personnes</a></div>
            <div><a onclick="addPersonne(8)" href="#" class="btn btn-primary shadow-lg">Ajouter 08 personnes</a></div>
            <div><a onclick="addPersonne(10)" href="#" class="btn btn-primary shadow-lg">Ajouter 10 personnes</a></div>
        </div>
    </section>
    <section class="card-body">
        <form id="nbUser" method="post" action="/?getNav=tirage" class="was-validated">
            <div id="container_nbUser" class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                <div class="mb-3">
                    <label for="nbUser01" class="form-label">Personne 01</label>
                    <input type="text" class="form-control user" id="nbUser01" name="nbUser01" placeholder="Louis" required>
                </div>
                <div class="mb-3">
                    <label for="nbUser02" class="form-label">Personne 02</label>
                    <input type="text" class="form-control user" id="nbUser02" name="nbUser02" placeholder="Charlemagne" required>
                </div>
                <div class="mb-3">
                    <label for="nbUser03" class="form-label">Personne 03</label>
                    <input type="text" class="form-control user" id="nbUser03" name="nbUser03" placeholder="Clovis" required>
                </div>
                <div class="mb-3">
                    <label for="nbUser04" class="form-label">Personne 04</label>
                    <input type="text" class="form-control user" id="nbUser04" name="nbUser04" placeholder="Napoléon" required>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="" class="btn btn-danger">Réinisialiser</a>
        </form>
    </section>
</article>