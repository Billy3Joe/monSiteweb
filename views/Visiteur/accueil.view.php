<!-- <h1>Page d'accueil</h1> -->
<div class="container-fluid header-bg" id="home">
  <div class="container desc-main wow fadeInUp">
    <div class="row">
      <div class="col-md-8">
        <h1 class="display-3"><a style="text-decoration:none; color:goldenrod; font-size:40px;" href="https://billy3joe.netlify.app/">Devéloppeur/Webdesigner</a></h1>
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

<div class="container components" id="compo">
  <div class="row align-items-center">
    <!-- Colonne de texte -->
    <div class="col-md-8 wow fadeInLeft">
      <h4 style="font-size: 50px;">Pourquoi Nous Choisir?</h4>
      <p>
        Nous vous aidons à transformer les idées 
        de votre entreprise en réalité en proposant
        des solutions numériques telles que le développement 
        de logiciels d'entreprise, le développement Web et le 
        développement d'applications mobiles. Nous fournissons 
        des services qui peuvent vous aider à transformer la vision 
        de votre entreprise en réalité!
  
        À l’ère de la technologie, votre entreprise a besoin
        de partenaires exceptionnels dotés d’une expérience 
        de classe mondiale, d’une expertise internationale et 
        d’un engagement sans précédent envers votre réussite. 
        WTI est une équipe axée sur le client, abordable et 
        dévouée qui aide les clients à inventer leur avenir.
        Bienvenue dans l'expérience WTI!
      </p>
    </div>
    
    <!-- Colonne d'image -->
    <div class="col-md-4 wow fadeInRight">
      <img src="<?= URL; ?>public/Assets/images/monLogo.png" alt="logo" class="img-fluid" />
    </div>
  </div>
  <div class="container components mt-1" id="compo">
    <h4 class="text-center mb-4 display-2" style="font-weight: bold; font-size:50px;"><span class="underline-yellow">Nos Services</span></h4>
    <div class="row">
        <?php foreach ($services as $service) : ?>
            <!-- Service -->
            <div class="col-md-3">
                <h5 class="text-center"><?php echo $service["title"] ?></h5>
                <div class="rounded-circle overflow-hidden mx-auto mb-3" style="width: 150px; height: 150px; border: 2px solid  #ffc107;">
                  <img class="customer-image" src="<?= $service['image'] ?>" width="100px" alt="Mes services" />
                </div>
                <p class="text-center"><?php echo $service["description"] ?></p>
            </div>
              <?php endforeach; ?>
          </div>
      </div>

    <div class="col-md-4 wow fadeInUp">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<main class="wrapper">
  <section class="breweries" id="breweries">
    <div style="background-color: #f7f7f7 !important;">
      <h4 class="text-center mb-4 display-2" style="font-weight: bold; font-size:50px;"><span class="underline-yellow">Travail en vedette</span></h4>
      <p class="text-center">Des expériences qui comptent</p>
    </div>
    
    <div class="container">
      <div class="row">
          <?php foreach ($experiences as $experience) : ?>
              <div class="col-md-4 mb-4">
                  <div class="card">
                      <img src="<?php echo $experience['image']; ?>" class="card-img-top" alt="<?php echo $experience['title']; ?>">
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $experience['title']; ?></h5>
                          <p class="card-text"><?php echo $experience['description']; ?></p>
                          <a href="<?php echo $experience['link_customer']; ?>" class="btn btn-primary">Lien du client</a>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
      </div>
   </div>
  </section>

  <div class="container components mt-1" id="compo">
    <h4 class="text-center mb-4 display-2" style="font-weight: bold; font-size:50px;"><span class="underline-yellow">Témoignages</span></h4>
    <div class="row">
        <?php foreach ($testimonials as $testimonial) : ?>
            <!-- Service -->
            <div class="col-md-4">
                <p class="text-center"><?php echo $testimonial["nom"] ?></p>
                <h5 class="text-center"><?php echo $testimonial["entreprise"] ?></h5>
                <p class="text-center"><?php echo $testimonial["details"] ?></p>
            </div>
              <?php endforeach; ?>
          </div>
      </div>

    <div class="col-md-4 wow fadeInUp">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
      </div>
    </div>
  </div>
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
      url("public/Assets/images/img1.jpg");
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

  .underline-yellow {
        position: relative;
        display: inline-block;
        padding-bottom: 5px;
      }

      .underline-yellow::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 3px; /* Hauteur de la bordure */
        background: linear-gradient(to right, transparent 10%, #ffc107 10%, #ffc107 90%, transparent 90%);
      }
  </style>