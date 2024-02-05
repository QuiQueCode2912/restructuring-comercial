function Counter() {
  const buttonRef = React.useRef(null);

  const [isLoading, setIsLoading] = React.useState(false);
  const [selectedHour, setSelectedHour] = React.useState([]);
  const [currentSchedule, setCurrentSchedule] = React.useState(null);
  const [isRefresh, setIsRefresh] = React.useState(false);
  const [isNext, setIsNext] = React.useState(true);
  const [slotsSelected, setSlotsSelected] = React.useState([]);

  const [currentDay, setCurrentDay] = React.useState(null);


  const [groups, setGroups] = React.useState([
    {
      "venue_id": 159,
      "id": "02i3m00000D9BANAA3",
      "parent_id": "02i3m00000DiduZAAR",
      "name": "PISCINA",
      "main_text": "",
      "secondary_text": "",
      "type": "Parque CDS",
      "hour_fee": "3.50",
      "mid_day_fee": "0.00",
      "all_day_fee": "0.00",
      "url": "",
      "status": "Disponible",
      "facilities": "Estacionamiento gratis;Food Court - En La Plaza;Baños (Clover, 167, Gimnasio y Piscina);Vestidores, duchas y casilleros (Gimnasio y Piscina)",
      "latitude": "8.99998816921851",
      "longitude": "-79.5806170092871",
      "seasonal_hour_fee": "3.50",
      "seasonal_mid_day_fee": "0.00",
      "seasonal_all_day_fee": "0.00",
      "show_on_website": "Si",
      "venue_facilities": "Graderías;Luminarias",
      "monthly_fee": "0",
      "nightcharge": 1,
      "weekendcharge": 1,
      "holidaycharge": 1,
      "residentdiscount": 1,
      "retireddiscount": 1,
      "kiddiscount": 1,
      "employeediscount": 1,
      "tipo_uso": "No exclusivo",
      "venuesorder": null,
      "showInCalendar": "Si",
      "image": "https://comercial.ciudaddelsaber.org/storage/venues/d9334feebad3dd21736cea0f14e771286cca6a0e482862e203632aa838cbb9fd_480.JPG"
    }
  ]);
  const [schedules, setSchedules] = React.useState([
    {
      "startTime": "05-30",
      "startTimeToShow": "05:30 AM",
      "endTime": "06-30",
      "endTimeToShow": "06:30 AM"
    },
    {
      "startTime": "07-00",
      "startTimeToShow": "07:00 AM",
      "endTime": "08-00",
      "endTimeToShow": "08:00 AM"
    },
    {
      "startTime": "08-30",
      "startTimeToShow": "08:30 AM",
      "endTime": "09-30",
      "endTimeToShow": "09:30 AM"
    },
    {
      "startTime": "10-00",
      "startTimeToShow": "10:00 AM",
      "endTime": "11-00",
      "endTimeToShow": "11:00 AM"
    },
    {
      "startTime": "11-30",
      "startTimeToShow": "11:30 AM",
      "endTime": "12-30",
      "endTimeToShow": "12:30 PM"
    },
    {
      "startTime": "13-00",
      "startTimeToShow": "01:00 PM",
      "endTime": "14-00",
      "endTimeToShow": "02:00 PM"
    },
    {
      "startTime": "14-30",
      "startTimeToShow": "02:30 PM",
      "endTime": "15-30",
      "endTimeToShow": "03:30 PM"
    },
    {
      "startTime": "16-00",
      "startTimeToShow": "04:00 PM",
      "endTime": "17-00",
      "endTimeToShow": "05:00 PM"
    },
    {
      "startTime": "17-30",
      "startTimeToShow": "05:30 PM",
      "endTime": "18-30",
      "endTimeToShow": "06:30 PM"
    },
    {
      "startTime": "21-00",
      "startTimeToShow": "07:00 PM",
      "endTime": "20-00",
      "endTimeToShow": "08:00 PM"
    }
  ]);



  const handleClick = async e => {
    e.preventDefault();
    let lsHoursToSchedule = [];
    selectedHour.forEach(element => {
      let objAux = {};
      objAux.fecha = element.fecha;
      objAux.id = element.id;
      objAux.venue = groups[0].name;
      objAux.subtotal = 3.50;
      objAux.calcularFact = true;
      objAux.personJubCount = element.persJub;
      objAux.personChildCount = element.persChilds;
      objAux.personAdultCount = element.persAdults;

      // Input time as a string
      var inputTime = element.startTime;

      // Parse the input time using Moment.js
      var time = moment(inputTime, "HH-mm");

      // Add 4 hours to the time
      time.add(5, "hours");

      // Format the result as "HH-MM"
      var formattedTime = time.format("HH-mm");
      objAux.startTime = formattedTime.replace('-', ':');

      // Input time as a string
      var inputTimeFinish = element.endTime;

      // Parse the input time using Moment.js
      var timeF = moment(inputTimeFinish, "HH-mm");

      // Add 4 hours to the time
      timeF.add(5, "hours");

      // Format the result as "HH-MM"
      var formattedTimeF = timeF.format("HH-mm");
      objAux.finishTime = formattedTimeF.replace('-', ':');

      let tot = element.persJub + element.persChilds + element.persAdults;
      objAux.totalPersons = tot.toString();

      lsHoursToSchedule.push(objAux);

    });

    document.getElementById('ReservasSeleccionadas').value = JSON.stringify(lsHoursToSchedule);
    buttonRef.current.click();
  }
  const handleSelect = e => {
    e.preventDefault();
    console.log(e)
    let sch = JSON.parse(e.target.dataset.schedule);

    // handleSelectHour(element,i,sch,targetDate);
    var isAdded = chkCambio(e);
    if (isAdded != false) {

      let checkIfExistHour = selectedHour.find(hour => hour.id == e.target.id && currentSchedule == hour.currentSchedule);

      if (checkIfExistHour) {
        const updatedArray = selectedHour.filter(item => item.id !== e.target.id);
        setSelectedHour(updatedArray);
      } else {
        setSelectedHour((prevData) => [...prevData,
        {
          id: e.target.id,
          name: e.target.dataset.venuename,
          fecha: e.target.dataset.input,
          totalBolas: 50,
          timeSelected: sch.startTimeToShow + '-' + sch.endTimeToShow,
          startTime: sch.startTime,
          endTime: sch.endTime,
          currentSchedule: currentSchedule
        }]
        );
      }
    }

  }

  const handleBolasSum = (e, id) => {
    e.preventDefault();
    setSelectedHour((prevData) =>
      prevData.map((item) => {
        if (item.id === id && currentSchedule == item.currentSchedule && item.totalBolas > 49 && item.totalBolas < 200) return { ...item, totalBolas: item.totalBolas + 50 }
        return item
      })
    );
  }

  const handleBolasRest = (e, id) => {
    e.preventDefault();
    setSelectedHour((prevData) =>
      prevData.map((item) => {
        if (item.id === id && currentSchedule == item.currentSchedule && item.totalBolas > 50 && item.totalBolas < 201) return { ...item, totalBolas: item.totalBolas - 50 }
        return item
      })
    );
  }

  React.useEffect(() => {
    // Add an event listener to capture the custom event
    const eventListener = async (event) => {
      if (event.detail.slotsSelected) setSlotsSelected(JSON.parse(event.detail.slotsSelected));
      setIsLoading(true);
    };

    //event dispach from  CORE.JS LINE 160
    window.addEventListener('slotsSelected', eventListener);

    // Clean up the event listener when the component unmounts
    return () => {
      window.removeEventListener('slotsSelected', eventListener);
    };
  }, []);

  React.useEffect(()=>{
      if(currentDay == null ){
          const date = new Date();
          const dayOfWeek = date.getDay();
          setCurrentDay(dayOfWeek);
      }
  },[currentDay])

                
  React.useEffect(() => {
    // Add an event listener to capture the custom event
    const eventListener = async(event) => {    
        setIsLoading(false); 
        const dayOfWeek = moment(event.detail.currentDate).day();
        setCurrentDay(dayOfWeek);
        setCurrentSchedule(event.detail.currentDate);
        //setSelectedHour([]);
        $("[id^='chkhora']").removeClass("selected");
        $("[id^='chkhora']").removeClass("secundary");
      
        setIsNext(false);
    };

    //event dispach from  CORE.JS LINE 143
    window.addEventListener('dateSelected', eventListener);

    // Clean up the event listener when the component unmounts
    return () => {
        window.removeEventListener('dateSelected', eventListener);
    };
}, []);



  return (
    <div>
      <div className='tDiv mt-2'>
        <table className='w-100' >
          <thead >
            <tr>
              <th className='headcol' ></th>
              {groups.length > 0 &&
                groups.map((element, i) => {
                  return (<th className='text-center' key={i} >
                    <div id="diaDisclaimer" data-toggle="popover" data-placement="bottom"
                      title="Dismissible popover"
                      data-content="And here's some amazing content. It's very engaging. Right?">
                      <a href='/' className='col-head'><b>{element.name}</b></a>
                    </div>
                  </th >);
                })}
            </tr>
          </thead>
          <tbody >

            {/* MARTES A VIERNES */}
            {schedules.length > 0 &&  currentDay < 6  &&  currentDay >= 0 &&  schedules.map((sch, i) => {

              //Chequear para la piscina si ese dia feriado  o lluvias
              if (currentSchedule) {
                if (checkIfExistBlockDay(currentSchedule)) return null;
              }

              let currentDate = moment();
              let currentInputValue = currentSchedule ? currentSchedule + ' ' + sch.startTimeToShow : moment().format('YYYY-MM-DD') + ' ' + sch.startTimeToShow;

              // Parse the given date string '2023-10-17 02:30 PM' and create a moment object
              var targetDate = moment(currentInputValue, 'YYYY-MM-DD hh:mm A');

              // Compare the current date with the target date
              if (currentDate.isAfter(targetDate)) {
                return '';
              } else {
                return (<tr key={i} /*id={"trHora" + sch.startTime}*/>
                  <th className='headcol'  >{sch.startTimeToShow} </th>
                  {groups.length > 0 && isRefresh == false &&
                    groups.map((element, i) => {



                      return (<td className='text-center position-relative' key={i}  >
                        <div className='spBtn' onClick={handleSelect}
                          id={"chkhora" + sch.startTime + groups[0].id}
                          name={"chkhora" + sch.startTime + groups[0].id}
                          data-venuename={groups[0].name}
                          data-venueid={groups[0].id}
                          data-time={sch.startTime}
                          data-input={currentInputValue}
                          data-schedule={JSON.stringify(sch)}
                        >

                          {sch.startTimeToShow}- {sch.endTimeToShow}


                        </div>

                      </td>);

                    })}
                </tr>);
              }
            })}

          </tbody>
        </table>



      </div>
      <hr />
      {selectedHour &&
        selectedHour.length > 0 && selectedHour.map((item) => {
          if (currentSchedule == item.currentSchedule) {
            console.log(item)
            return (<div >

              <h4 className='w-100 text-left'>{item.name} {item.startTime} - {item.endTime}   </h4>
              <div className=' '>
                <div className='p-2 d-flex align-items-center'>
                  <p className='mb-1'>Bolas</p>
                  <div className='d-flex  align-items-center ml-2  '>
                    <input type="number" value={item.totalBolas} className="form-control  text-center w-25 " readonly min="1" oninput="this.value = Math.abs(this.value)"
                      name="cantidadPersonas" />
                    <div className=''>
                      <button className='btn btn-primary  ml-1' onClick={e => handleBolasSum(e, item.id)}>+</button>
                      <button className='btn btn-primary  ml-1' onClick={e => handleBolasRest(e, item.id)}>-</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>);
          }

        })
      }

      <div class="row">
        <div id="espaciosSeleccionados" class="col-12 col-md-12 espacios-seleccionados">
          <a id="esPlaceholder" href="#"><small>Debes seleccionar al menos un
            espacio!</small></a>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-12">
          <div class="form-group">
            <label for="description"><small>Describe tu
              reserva(opcional)</small></label>
            <textarea name="description" id="description"></textarea>
          </div>
        </div>
      </div>
      <div class="row buttons">
        <div class="col-12 text-center">
          <a href="/cotizacion/datos-contacto" class="btn btn-primary">Anterior</a>
          <button class="btn btn-primary" onClick={handleClick} disabled={isNext} >Siguiente</button>
          <button type="submit" class="btn btn-primary submit-form d-none" ref={buttonRef}>Siguiente</button>
        </div>
      </div>


    </div>

  );
}
ReactDOM.render(<Counter />, document.getElementById('rootGolf'));