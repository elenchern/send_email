$(document).ready(function() {
    $('.appartament button').on('click', function() {
        $(this).toggleClass('checked');
    });
    $('.delFrom').on('click', function() {
        $('#priceFrom').val('');
        $(this).removeClass('active');
    });
    $('.delTo').on('click', function() {
        $('#priceTo').val('');
        $(this).removeClass('active');
    });

    $('.area .title, .time .title').on('click', function() {
        $(this).parent().toggleClass('active');
    })

    $('.option-item').on('click', function(e) {
        $(this).closest('.active').find('.title span').text($(this).text());
        $(this).parent().hide();
        $(this).closest('.active').removeClass('active');
    })

    // $("#phone").mask("+7(999) 999-9999");
    const phone = document.getElementById('phone');

if (phone) {
  phone.onfocus = () => {
    newIMask(phone)
  }
}

function newIMask(phone) {
  let phoneMask = IMask(
    phone, {
      mask: '{+7} (000) 000-00-00',
      lazy: false
    });
  phone.value = phoneMask.unmaskedValue; //если закомментировать, то по табу курсор сместиться вконец
}

    $(".numeric").numeric({ decimal : ".",  negative : false, scale: 3 });

    $('.numeric').keyup( function() {
        console.log(1)
        if($(this).val() !== '') {
            $(this).parent().find('img').addClass('active');
        } else {
            $(this).parent().find('img').removeClass('active');
        }
      });
})

let data = '';
$('.opros-container button[type="submit"').on('click', function(e) {
    e.preventDefault();
    // priceFrom=111&priceTo=222
    let appart  = '';
    
    if($('.appartament .checked').length == 0){
        alert('Выберите количество комнат');
        return false;
    }
    $('.appartament .checked').each(function() {
        appart += $(this).text() + ', ';
    });
    $('#sendOtdelka').val($('#otdelka').val());
    $('#sendAppart').val(appart.substr(0, appart.length - 2));
    $('#sendArea').val($('.area .title').text().trim());
    $('#sendTime').val($('.time .title').text().trim());
    $('#sendPrice').val($('#priceFrom').val() + '-' + $('#priceTo').val());

    // appart = 'appartament="'+appart.substr(0, appart.length - 2)+'"&';
    // let area = '&area="'+$('.area .title').text()+'"';
    // let time = '&time="'+$('.time .title').text()+'"';
    // data = appart+$('.opros-container').serialize()+area+time;
    // console.log(data);
    $('.step-1').hide();
    $('.step-2').show();
})


async function submitForm(e) {
    e.preventDefault();// отключаем перезагрузку/перенаправление страницы
    if($('#phone').val().replace(/[^0-9]/g,"").length <11) {return false};
    try {
        // Формируем запрос
      const response = await fetch(event.target.action, {
          method: 'POST',
          body: new FormData(event.target)
      });
      // проверяем, что ответ есть
      if (!response.ok) throw (`Ошибка при обращении к серверу: ${response.status}`);
      // проверяем, что ответ действительно JSON
      const contentType = response.headers.get('content-type');
      if (!contentType || !contentType.includes('application/json')) {
        throw ('Ошибка обработки. Ответ не JSON');
      }
      // обрабатываем запрос
      const json = await response.json();
      if (json.result === "success") {
          // в случае успеха
          $('.step-2').hide();
          $('.step-3').show();
      } else { 
          // в случае ошибки
          console.log(json);
          throw (json.info);
      }
    } catch (error) { // обработка ошибки
    //   alert(error);
    }
  }

  $('.back').on('click', function() {
    $('.step-2').hide();
    $('.step-1').show();
  })


