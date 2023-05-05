<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SKOLA STRANIH JEZIKA</title>
  <link rel="stylesheet" href="globall.css"> 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>



<body>
  <!-- Modal za izmenu - JEZICI pocetna stranica -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmena jezika</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="naziv_jezika">Naziv jezika:</label>
              <input type="text" class="form-control" id="naziv_jezika" value='' required>
            </div>
            <div class="form-group">
              <label for="nastavnik">Nastavnik jezika:</label>
              <select type="text" class="form-control" id="nastavnik" value='' required></select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="broj_termina">Broj termina</label>
                <!-- placeholder/value -->
                <input type="text" id="broj_termina" class="form-control" placeholder="0">
              </div>
            </fieldset>
            <div class="d-grid gap-2">
              <a href='./terminiZaJezik.php' id='sviTermini'><button class="btn btn-warning" style="background-color: #5D7583;" type="button">Svi termini</button></a>
            </div>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #94A7B3;">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_sacuvaj" style="background-color: #7C95A2;">Sacuvaj</button>
          <button type='button' class="btn btn-danger" data-dismiss="modal" id="button_delete" style="background-color: #5D7683;">Obrisi</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal za dodavanje - JEZIKA pocetna stranica -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodavanje novog jezika</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="naziv_jezika_dodaj">Naziv jezika:</label>
              <input type="text" class="form-control" id="naziv_jezika_dodaj" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="nastavnik_dodaj">Nastavnik jezika:</label>
              <select class="form-control" id="nastavnik_dodaj" placeholder="" required></select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="broj_termina_dodaj">Broj termina</label>
                <input type="text" id="broj_termina_dodaj" class="form-control" placeholder="0">
              </div>
            </fieldset>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #94A7B3;">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_dodaj" style="background-color: #5D7583;">Dodaj</button>
        </div>
      </div>
    </div>
  </div>


  <?php include 'header.php'; ?>

  <!-- SADRZAJ -->
  <div class='centerDiv'>
    <div class='left_div grid-item'>
    </div>
    <div class='middle_div grid-item'>
      <div class='h_div'>
        <h1 class='h1_text'>Jezici</h1>
      </div>
      <div class='table_div table-hover'>
        <table class="table">
          <thead class="thead-red" style="background-color: #D2CCE1;">
            <tr>
              <th scope="col"></th>
              <th scope="col">Jezik</th>
              <th scope="col">Nastavnik</th>
              <th scope="col">Broj termina</th>
            </tr>
          </thead>
          <tbody id='jezici'>
            <!-- generisu se jezici iz baze  -->
          </tbody>
        </table>
      </div>

      <!-- DUGME NOV JEZIK -->
      <div class="button_div1">
        <button data-toggle="modal" data-target="#exampleModal" type="button" data-backdrop="static"
          class="btn btn-secondary btn-lg btn-block">NOV JEZIK</button>
      </div>

    </div>

    <div class='right_div grid-item'>

    </div>

  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    
  <script>
    let jezici = [];
    let nastavnici = [];
    let trenutniId = -1;

    $(document).ready(function () {

        ucitajJezike();
        ucitajNastavnike();

      // Dugme za cuvanje izmena
      $('#button_sacuvaj').click(function () {
        if (trenutniId == -1) {
          return;
        }
        const naziv = $('#naziv_jezika').val();
        if(naziv === "") {
            alert("Morate uneti naziv jezika!");
            return false;
        }
        const nastavnik = $('#nastavnik').val();
        $.post('../jezikHandlers/update.php', { id: trenutniId, naziv: naziv, nastavnik: nastavnik }, function (data) {
          console.log(data);
          if (data != 1) {
            alert(data);
            return;
          }
          ucitajJezike();
          trenutniId = -1;
        })
      })

      // Dugme za brisanje
      $('#button_delete').click(function () {
        if (trenutniId == -1) {
          return;
        }
        $.post('../jezikHandlers/delete.php', { id: trenutniId }, function (data) {
          if (data != 1) {
            alert(data);
            return;
          }
          console.log({ trenutniId: trenutniId });
          if (data == 1) {
            console.log('filter')
            jezici = jezici.filter(function (elem) { return elem.id != trenutniId });
            iscrtajTabelu();
          }

          trenutniId = -1;
        })
      })
      
      // Dugme za dodavanje
      $('#button_dodaj').click(function (e) {
        const naziv = $('#naziv_jezika_dodaj').val();
        if(naziv === "") {
            alert("Morate uneti naziv jezika!");
            return false;
        }
        else {
            const nastavnik = $('#nastavnik_dodaj').val();
            $.post('../jezikHandlers/add.php', { naziv: naziv, nastavnik: nastavnik }, function (data) {
            console.log(data);
            if (data != 1) {
            alert(data);
            return;
          }
          ucitajJezike();
        })
        }
      })

      // Modal za dodavanje 
      $('#exampleModal').on('show.bs.modal', function (e) {
        $('#nastavnik_dodaj').html('');
        for (let nastavnik of nastavnici) {
          $('#nastavnik_dodaj').append(`
            <option value='${nastavnik.id}'>${nastavnik.imePrezime}</option>
          `)
        }
      })

      // Modal za izmenu
      $('#exampleModal2').on('show.bs.modal', function (e) {
        const button = $(e.relatedTarget);
        const id = button.data('id');
        trenutniId = id;
        
        $('#nastavnik').html('');
        for (let nastavnik of nastavnici) {
          $('#nastavnik').append(`
            <option value='${nastavnik.id}'>${nastavnik.imePrezime}</option>
          `)
        }

        const jezik = jezici.find(function (elem) {
          return elem.id == id;
        });
        if (!jezik) {
          return;
        }
        $('#sviTermini').attr('href', 'terminiZaJezik.php?id=' + id)
        $('#nastavnik').val(jezik.nastavnik);
        $('#naziv_jezika').val(jezik.naziv);
        $('#broj_termina').val(jezik.broj_termina);
      })

    })



    // Definicije funkcija
    function ucitajNastavnike() {
      $.getJSON('../nastavnikHandlers/getAll.php', function (data) {
        if (!data.status) {
          alert(data.greska);
          return;
        }
        nastavnici = data.nastavnici;
        console.log(nastavnici);
      })
    }

    function ucitajJezike() {
      $.getJSON('../jezikHandlers/getAll.php', function (data) {
        if (!data.status) {
          alert(data.greska);
          return;
        }
        console.log(data.jezici)
        jezici = data.jezici;
        iscrtajTabelu();
      })
    }

    function iscrtajTabelu() {
      $('#jezici').html('');
      let index = 1;
      for (let jezik of jezici) {
        $('#jezici').append(`
          <tr data-toggle="modal" data-target="#exampleModal2" data-backdrop="static" data-id=${jezik.id}  >
              <th scope="row">${index++}</th>
              <td>${jezik.naziv}</td>
              <td>${jezik.nastavnik_imePrezime}</td>
              <td>${jezik.broj_termina}</td>
            </tr>
          `)
      }
    }
  </script>
</body>

</html>