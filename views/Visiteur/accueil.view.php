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

<!--DOWNLOAD-->
<div class="container-fluid download-bg wow fadeInUp" id="download">
  <div class="container">
    <div class="row justify-content-end">
      <div>
        <h3>Small Screen, Big Ideas</h3>
        <p style="width: 400px;">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia explicabo earum dolore voluptatibus esse, enim aliquid cumque a pariatur nisi, aspernatur placeat animi officia reprehenderit quasi ut voluptates optio ratione?
        </p>
      </div>
    </div>
  </div>
</div>
<!--LINKS-->
<div class="container links" id="link">
  <div class="row">
    <div class="col-md-6">
      <img class="img-fluid wow fadeInRight" src="https://drive.google.com/uc?id=1TPbGx5egyh-bSBqOS-oDUjwPZ_XRH9LB" />
    </div>
    <div class="col-md-6 wow fadeInLeft">
      <h5>Small Watch, Big Time!</h5>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas vero odio quae quos. Consequatur explicabo illum, neque, nobis blanditiis sapiente.
      </p>
      <h5>Small Watch, Big Time!</h5>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas vero odio quae quos. Consequatur explicabo illum, neque, nobis blanditiis sapiente.
      </p>
    </div>
  </div>
</div>
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
