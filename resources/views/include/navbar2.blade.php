      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/asspr-admin')}}">
              <i class="ti-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="ti-clipboard menu-icon"></i>
              <span class="menu-title">Création</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{URL::to('asspr-admin/ajoutercategorie')}}">Ajouter catégorie</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/asspr-admin/ajouterproduit')}}">Ajouter Produit</a></li>
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/asspr-admin/ajouterslider')}}">Ajouter un slider</a></li>
                <li class="nav-item"><a class="nav-link" href="wizard.html">Ajouter un challenge</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="ti-layout menu-icon"></i>
              <span class="menu-title">Affichage</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/asspr-admin/categories')}}">Catégories</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/asspr-admin/produits')}}">Produits</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/asspr-admin/slider')}}">Slider</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/asspr-admin/commandes')}}">Commandes</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/asspr-admin/clients')}}">Clients</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>