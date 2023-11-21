<!-- <h1>Page d'accueil</h1> -->

<div class="container-fluid header-bg" id="home">
  <div class="container desc-main wow fadeInUp">
    <div class="row">
      <div class="col-md-8">
        <h1 class="display-3">Le Missionnaire Racheté vous souhaite la bienvenue.</h1>
        <p class="lead">
        Jean 3 :
        16- Car Dieu a tant aimé le monde qu'il a donné son Fils unique, afin que quiconque croit en lui ne périsse point, mais qu'il ait la vie éternelle.
        <br>
        <br>17- Dieu, en effet, n'a pas envoyé son Fils dans le monde pour qu'il juge le monde, mais pour que le monde soit sauvé par lui.…
        </p>
        <a href="#"><img src="<?= URL; ?>public/Assets/images/Bible.png" width="150" alt="Logo" /></a>
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

<style>
  /* Typography imported from Google Fonts */
@import url('https://fonts.googleapis.com/css?family=Playfair+Display|Source+Sans+Pro:200,400');

h1, h2, h3, h4, h5, h6 {
  font-family: 'Playfair Display', serif;
}

p, a {
  font-family: 'Source Sans Pro', sans-serif;
}

/* Generic styles */
html {
  scroll-behavior: smooth;
}

.linkCard {
  background-color: goldenrod;
  text-decoration: none;
  color: white;
  border-radius: .25rem;
  text-align: center;
  display: inline-block;
  transition: all .3s;
}

.linkCard:hover {
  opacity: .6;
}

/* Styles for the hero image */
/* breweries styles */
.breweries {
  padding: 2rem;
}

.breweries > ul {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  grid-gap: 1rem;
}

.breweries > ul > li {
  border: 1px solid #E2E2E2;
  border-radius: .5rem;
}

.breweries > ul > li > figure {
  max-height: 220px;
  overflow: hidden;
  border-top-left-radius: .5rem;
  border-top-right-radius: .5rem;
  position: relative;
}

.breweries > ul > li > figure > img {
  width: 100%;
}

.breweries > ul > li > figure > figcaption {
  position: absolute;
  bottom: 0;
  background-color: rgba(0,0,0,.7);
  width: 100%;
}

.breweries > ul > li > figure > figcaption > h3 {
  color: white;
  padding: .75rem;
  font-size: 1.25rem;
}

.breweries > ul > li > p {
  font-size: 1rem;
  line-height: 1.5;
  padding: 1rem .75rem;
  color: #666666;
}

.breweries > ul > li > a {
  padding: .5rem 1rem;
  margin: .5rem;
}

</style>
<!--CONTACT-->
<div class="container-fluid contact-us" id="contact">
  <div class="container">
    <h1 class="display-3 wow fadeInUp">Go On! Contact Us</h1>
    <p class="lead">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, velit, at. Ea officiis ullam, qui cum cumque mollitia vel, sed autem esse sint unde voluptatem, sapiente doloremque tenetur ipsa illum.
    </p>
    <form>
      <div class="form-group wow fadeInUp">
        <label for="formGroupExampleInput">Example label</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" />
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Another label</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" />
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
