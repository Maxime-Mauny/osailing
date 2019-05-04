var app = {

  init: function() {

    console.log('init');

    // Mise en place de Rellax
    // Rellax est disponible ici car déclaré dans
    // notre fichier de conf de Webpack (ProvidePlugin)
    // https://www.npmjs.com/package/rellax
    var rellax = new Rellax('.header', {
      speed: 3
    });

    // Mise en place de scrollex
    // Je commence par cibler toutes mes sections dans mon main
    $('.main > section').each(function() {

      // Pour chaque section (each)...

      console.log(this);
      // this = ma section

      // Je "jquerise" mon élément
      // $(this) = ma section jquerysée

      // Je récupere l'id de l'élement (= ma section)
      // il correspond à mon ancre
      // cela me sera utile plus tard...
      var id = $(this).attr('id');

      console.log(id);

      console.log($(this));

      // J'applique scrollex sur mon element (= ma section)
      $(this).scrollex({

        // Je dit à scrollex de se baser sur le milieu de la page
        // https://www.npmjs.com/package/jquery.scrollex#mode
        mode: 'middle',

        // Lorsque mon élément rentre sur la page (= milieu car mode: middle)
        // https://www.npmjs.com/package/jquery.scrollex#enter
        enter: function() {

          console.log(this);
          console.log('est entré sur la page');
        }
      });
    });

  }

};

$(app.init);
