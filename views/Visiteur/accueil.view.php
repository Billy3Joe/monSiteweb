<!-- <h1>Page d'accueil</h1> -->

<div class="container-fluid header-bg" id="home">
  <div class="container desc-main wow fadeInUp">
    <div class="row">
      <div class="col-md-8">
        <h1 class="display-3"><a style="text-decoration:none; color:goldenrod;" href="https://billy3joe.netlify.app/">Devéloppeur/Designer</a></h1>
        <p class="lead">
           Développeur Web & Mobile avec un BTS en Gestion des Systèmes d'Information (mention très bien) et une licence en Digital. Actuellement en Master 2. Passionné des nouvelles technologies, du Design, je crée également des solutions digitales uniques.<br>  
           <mark style="font-weight:bold;">Votre projet, notre passion commune.</mark>
        </p>
        <form action="<?= URL ?>choix_creations" method="post">
            <label for="choixCreation" style="font-weight: bold;">Mes créations :</label>
            <select id="choixCreation" name="choixCreation">
                <option value="developpement">Développement</option>
                <option value="design">Design</option>
            </select>
            <button type="submit">Voir</button>
        </form>
        
        <!-- <a href="#"><img src="<?= URL; ?>public/Assets/images/Bible.png" width="150" alt="img" /></a> -->
        <!-- <a href="#"><img src="https://drive.google.com/uc?id=1TD3o0DRWfjRYSLd2P0ql3O1AN9CPFXkE"/></a> -->
      </div>
    </div>
  </div>
</div>

<!--Components-->
<div class="container components" id="compo">
  <div class="row">
    <div class="col-md-4 wow fadeInLeft">
      <h5>Share Something Meaningful With Your Loved Ones</h5>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti nihil reiciendis alias facilis aspernatur veniam eligendi, perspiciatis ducimus quasi!
      </p>
    </div>
    <div class="col-md-4 wow fadeInUp">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid watch"  src="<?= URL; ?>public/Assets/images/Bible.png" alt="First slide" />
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 wow fadeInRight">
      <h5>Share Something Meaningful With Your Loved Ones</h5>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti nihil reiciendis alias facilis aspernatur veniam eligendi, perspiciatis ducimus quasi!
      </p>
    </div>
  </div>
</div>

<main class="wrapper">
  <section class="breweries" id="breweries">
    <ul>
      <li>
        <figure>
          <!-- Photo by Quentin Dr on Unsplash -->
          <img src="https://images.unsplash.com/photo-1471421298428-1513ab720a8e" alt="Several hands holding beer glasses">
          <figcaption><h3>Billions upon billions</h3></figcaption>
        </figure>
        <p>
          Made in the interiors of collapsing stars star stuff harvesting star light venture billions upon billions Drake Equation brain is the seed of intelligence?
        </p>
        <a class="linkCard" href="#">Visit Website</a>
      </li>
      <li>
        <figure>
          <!-- Photo by Drew Farwell on Unsplash -->
          <img src="https://images.unsplash.com/photo-1513309914637-65c20a5962e1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3450&q=80" alt="Several friends doing a toast">
          <figcaption><h3>Drake Equation</h3></figcaption>
        </figure>
        <p>
          Another world citizens of distant epochs from which we spring descended from astronomers Orion's sword shores of the cosmic ocean.
        </p>
        <a class="linkCard" href="#">Visit Website</a>
      </li>
      <li>
        <figure>
          <!-- Photo by Rawpixel on Unsplash -->
          <img src="https://images.unsplash.com/photo-1535359056830-d4badde79747?ixlib=rb-1.2.1&auto=format&fit=crop&w=3402&q=80" alt="Three different glasses of beer">
          <figcaption><h3>Vast cosmic arena</h3></figcaption>
        </figure>
        <p>
          Galaxies the ash of stellar alchemy prime number science inconspicuous motes of rock and gas brain is the seed of intelligence.
        </p>
        <a class="linkCard" href="#">Visit Website</a>
      </li>
    </ul>
  </section>
</main>

<!--CONTACT-->
<div class="container-fluid contact-us" id="contact">
  <div class="container">
    <h1 class="display-3 wow fadeInUp">Go On! Contact Us</h1>
    <p class="lead">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, velit, at. Ea officiis ullam, qui cum cumque mollitia vel, sed autem esse sint unde voluptatem, sapiente doloremque tenetur ipsa illum.
    </p>
    <form class="form-inline" action="" method="post">
      <div class="form-group wow fadeInUp">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name"  name="name" required="required" data-error="Firstname is required." placeholder="Your Name" />
      </div>
      <div class="form-group wow fadeInUp">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required="required" data-error="Firstname is required." placeholder="Your Email" />
      </div>
      <div class="form-group wow fadeInUp">
        <label for="phone">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" data-error="Firstname is required." placeholder="Your Phone" />
      </div>
      <div class="form-group wow fadeInUp">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" rows="5" name="message" required="required" data-error="Firstname is required." placeholder="Your Message"></textarea>
      </div>
      <div class="col s12">
          <div class="col s12">
              <input type="submit" name="ok" class="btn btn-warning btn-send" value="Envoyer">
          </div>
      </div>
    </form>
  </div>
</div>


<style>
  .header-bg {
  background: linear-gradient(to left, rgba(33, 33, 33, 0.27), rgb(33, 33, 33)),
      url("public/Assets/images/img1.webp");
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  color: #fff;
  }

  .download-bg {
  background: linear-gradient(to right, rgba(0, 0, 0, 0), rgb(33, 33, 33)),
      url("public/Assets/images/img2.jpg");
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  padding-top: 5rem;
  padding-bottom: 5rem;
  color: #fff;
  }
  </style>