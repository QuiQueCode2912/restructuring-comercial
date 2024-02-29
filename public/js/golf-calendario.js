function GolfCalendar() {
    const buttonRef = React.useRef(null);

    const [isLoading, setIsLoading] = React.useState(false);
    const [selectedHour, setSelectedHour] = React.useState([]);
    const [currentSchedule, setCurrentSchedule] = React.useState(null);
    const [isRefresh, setIsRefresh] = React.useState(false);
    const [isNext, setIsNext] = React.useState(true);
    const [slotsSelected, setSlotsSelected] = React.useState([]);

    const [currentDay, setCurrentDay] = React.useState(null);

    const [groups, setGroups] = React.useState([]);

    const [schedules, setSchedules] = React.useState([
        {
            startTime: "13",
            startTimeToShow: "01:00 PM",
            endTime: "14",
            endTimeToShow: "02:00 PM",
        },
        {
            startTime: "14",
            startTimeToShow: "02:00 PM",
            endTime: "15",
            endTimeToShow: "03:00 PM",
        },
        {
            startTime: "15",
            startTimeToShow: "03:00 PM",
            endTime: "16",
            endTimeToShow: "04:00 PM",
        },
        {
            startTime: "16",
            startTimeToShow: "04:00 PM",
            endTime: "17",
            endTimeToShow: "05:00 PM",
        },
        {
            startTime: "17",
            startTimeToShow: "05:00 PM",
            endTime: "18",
            endTimeToShow: "06:00 PM",
        },
        {
            startTime: "18",
            startTimeToShow: "06:00 PM",
            endTime: "19",
            endTimeToShow: "07:00 PM",
        },
    ]);

    const handleClick = async (e) => {
        e.preventDefault();
        let lsHoursToSchedule = [];
        selectedHour.forEach((element) => {
            let objAux = {};
            objAux.fecha = moment(element.fecha).format("YYYY-MM-DD");
            objAux.id = element.id;
            objAux.venue = element.name;
            objAux.totalBolas = element.totalBolas;
            objAux.isGolf = true;
            objAux.isDescountJub = element.isDescountJub
                ? element.isDescountJub
                : false; // Chequear  por si es jubilado  aplicar descuento
            // Input time as a string
            var inputTime = element.startTime;

            // Parse the input time using Moment.js
            var time = moment(inputTime, "HH-mm");

            // Add 4 hours to the time
            time.add(5, "hours");

            // Format the result as "HH-MM"
            var formattedTime = time.format("HH-mm");
            objAux.startTime = formattedTime.replace("-", ":");

            // Input time as a string
            var inputTimeFinish = element.endTime;

            // Parse the input time using Moment.js
            var timeF = moment(inputTimeFinish, "HH-mm");

            // Add 4 hours to the time
            timeF.add(5, "hours");

            // Format the result as "HH-MM"
            var formattedTimeF = timeF.format("HH-mm");
            objAux.finishTime = formattedTimeF.replace("-", ":");

            lsHoursToSchedule.push(objAux);
        });

        document.getElementById("ReservasSeleccionadas").value =
            JSON.stringify(lsHoursToSchedule);
        buttonRef.current.click();
    };
    const handleSelect = (e) => {
        e.preventDefault();
        console.log(e);
        let sch = JSON.parse(e.target.dataset.schedule);

        // handleSelectHour(element,i,sch,targetDate);
        var isAdded = chkCambio(e);
        if (isAdded != false) {
            let checkIfExistHour = selectedHour.find(
                (hour) =>
                    hour.id == e.target.id &&
                    currentSchedule == hour.currentSchedule
            );

            if (checkIfExistHour) {
                const updatedArray = selectedHour.filter(
                    (item) => item.id !== e.target.id
                );
                setSelectedHour(updatedArray);
            } else {
                setSelectedHour((prevData) => [
                    ...prevData,
                    {
                        id: e.target.id,
                        name: e.target.dataset.venuename,
                        fecha: e.target.dataset.input,
                        totalBolas: 50,
                        timeSelected:
                            sch.startTimeToShow + "-" + sch.endTimeToShow,
                        startTime: sch.startTime,
                        endTime: sch.endTime,
                        currentSchedule: currentSchedule,
                    },
                ]);
            }
        }
    };

    const handleBolasSum = (e, id) => {
        e.preventDefault();
        setSelectedHour((prevData) =>
            prevData.map((item) => {
                if (
                    item.id === id &&
                    currentSchedule == item.currentSchedule &&
                    item.totalBolas > 49 &&
                    item.totalBolas < 100
                )
                    return { ...item, totalBolas: item.totalBolas + 50 };
                return item;
            })
        );
    };

    const handleToggleCheckbox = (e, id) => {
        setSelectedHour((prevData) =>
            prevData.map((item) => {
                if (item.id === id && currentSchedule == item.currentSchedule)
                    return { ...item, isDescountJub: e.target.checked };
                return item;
            })
        );
    };

    const handleBolasRest = (e, id) => {
        e.preventDefault();
        setSelectedHour((prevData) =>
            prevData.map((item) => {
                if (
                    item.id === id &&
                    currentSchedule == item.currentSchedule &&
                    item.totalBolas > 50 &&
                    item.totalBolas < 101
                )
                    return { ...item, totalBolas: item.totalBolas - 50 };
                return item;
            })
        );
    };

    React.useEffect(() => {
        // Add an event listener to capture the custom event
        const eventListener = async (event) => {
            if (event.detail.slotsSelected)
                setSlotsSelected(JSON.parse(event.detail.slotsSelected));
            setIsLoading(true);
        };

        //event dispach from  CORE.JS LINE 160
        window.addEventListener("slotsSelected", eventListener);

        // Clean up the event listener when the component unmounts
        return () => {
            window.removeEventListener("slotsSelected", eventListener);
        };
    }, []);

    React.useEffect(() => {
        if (currentDay == null) {
            const date = new Date();
            const dayOfWeek = date.getDay();
            setCurrentDay(dayOfWeek);
        }
    }, [currentDay]);

    React.useEffect(() => {
        // Add an event listener to capture the custom event
        const eventListener = async (event) => {
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
        window.addEventListener("dateSelected", eventListener);

        // Clean up the event listener when the component unmounts
        return () => {
            window.removeEventListener("dateSelected", eventListener);
        };
    }, []);

    React.useEffect(() => {
        // Access the PHP variable here
        if (phpVariable) {
            setGroups(phpVariable);
        }
    }, [phpVariable]);

    return (
        <div>
            <div className="tDiv mt-2">
                <table className="w-100">
                    <thead>
                        <tr>
                            <th className="headcol"></th>
                            {groups.length > 0 &&
                                groups.map((element, i) => {
                                    if (i < 4) {
                                        return (
                                            <th className="text-center" key={i}>
                                                <div
                                                    id="diaDisclaimer"
                                                    data-toggle="popover"
                                                    data-placement="bottom"
                                                    title="Dismissible popover"
                                                    data-content="And here's some amazing content. It's very engaging. Right?"
                                                >
                                                    <a
                                                        href="/"
                                                        className="col-head"
                                                    >
                                                        <b>{element.name}</b>
                                                    </a>
                                                </div>
                                            </th>
                                        );
                                    }
                                })}
                        </tr>
                    </thead>
                    <tbody>
                        {/* LUNES A VIERNES */}
                        {schedules.length > 0 &&
                            currentDay < 6 &&
                            currentDay >= 1 &&
                            schedules.map((sch, i) => {
                                let currentDate = moment();
                                let currentInputValue = currentSchedule
                                    ? currentSchedule +
                                      " " +
                                      sch.startTimeToShow
                                    : moment().format("YYYY-MM-DD") +
                                      " " +
                                      sch.startTimeToShow;

                                // Parse the given date string '2023-10-17 02:30 PM' and create a moment object
                                var targetDate = moment(
                                    currentInputValue,
                                    "YYYY-MM-DD hh:mm A"
                                );

                                // Compare the current date with the target date
                                if (currentDate.isAfter(targetDate)) {
                                    return "";
                                } else {
                                    return (
                                        <tr
                                            key={
                                                i
                                            } /*id={"trHora" + sch.startTime}*/
                                        >
                                            <th className="headcol">
                                                {sch.startTimeToShow}{" "}
                                            </th>
                                            {groups.length > 0 &&
                                                isRefresh == false &&
                                                groups.map((element, i) => {
                                                    return (
                                                        <td
                                                            className="text-center position-relative"
                                                            key={i}
                                                        >
                                                            <div
                                                                className="spBtn"
                                                                onClick={
                                                                    handleSelect
                                                                }
                                                                id={
                                                                    "chkhora" +
                                                                    sch.startTime +
                                                                    element.id
                                                                }
                                                                name={
                                                                    "chkhora" +
                                                                    sch.startTime +
                                                                    element.id
                                                                }
                                                                data-venuename={
                                                                    element.name
                                                                }
                                                                data-venueid={
                                                                    element.id
                                                                }
                                                                data-time={
                                                                    sch.startTime
                                                                }
                                                                data-input={
                                                                    currentInputValue
                                                                }
                                                                data-schedule={JSON.stringify(
                                                                    sch
                                                                )}
                                                                data-parentid={
                                                                    element.parent_id
                                                                }
                                                            >
                                                                {
                                                                    sch.startTimeToShow
                                                                }
                                                                -{" "}
                                                                {
                                                                    sch.endTimeToShow
                                                                }
                                                            </div>
                                                        </td>
                                                    );
                                                })}
                                        </tr>
                                    );
                                }
                            })}
                    </tbody>
                </table>
            </div>
            <hr />
            <div className="row">
                {selectedHour &&
                    selectedHour.length > 0 &&
                    selectedHour.map((item) => {
                        if (currentSchedule == item.currentSchedule) {
                            return (
                                <div className="col-6 col-md-4 m-0 p-0">
                                    <div className=" card-col">
                                        <h4 className="w-100 text-center">
                                            {item.name}
                                        </h4>
                                        <p className="w-100 text-center card-subtitle mb-2 text-muted">
                                            {item.startTime + ":00 PM"} -{" "}
                                            {item.endTime + ":00 PM"}
                                        </p>
                                        <div className=" ">
                                            <div className="w-100 d-flex ">
                                                <p className="mb-1 w-50">
                                                    Bolas
                                                </p>
                                                <input
                                                    type="text"
                                                    value={item.totalBolas}
                                                    className="form-control  text-center w-50 "
                                                    readonly
                                                    min="1"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    name="cantidadPersonas"
                                                />
                                            </div>

                                            <div className="">
                                                <button
                                                    className="btn btn-outline-primary  card-button mt-2 "
                                                    onClick={(e) =>
                                                        handleBolasRest(
                                                            e,
                                                            item.id
                                                        )
                                                    }
                                                >
                                                    -
                                                </button>
                                                <button
                                                    className="btn btn-outline-primary card-button mt-2"
                                                    onClick={(e) =>
                                                        handleBolasSum(
                                                            e,
                                                            item.id
                                                        )
                                                    }
                                                >
                                                    +
                                                </button>
                                            </div>

                                            <div class="custom-control custom-switch d-block w-100">
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id={"checbox-" + item.id}
                                                    onChange={(e) =>
                                                        handleToggleCheckbox(
                                                            e,
                                                            item.id
                                                        )
                                                    }
                                                />
                                                <label
                                                    class="custom-control-label"
                                                    for={"checbox-" + item.id}
                                                >
                                                    <small>Jubilado</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            );
                        }
                    })}
            </div>

            <div class="row">
                <div
                    id="espaciosSeleccionados"
                    class="col-12 col-md-12 espacios-seleccionados"
                >
                    <a id="esPlaceholder" href="#">
                        <small>Debes seleccionar al menos un espacio!</small>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="description">
                            <small>Describe tu reserva(opcional)</small>
                        </label>
                        <textarea
                            name="description"
                            id="description"
                        ></textarea>
                    </div>
                </div>
            </div>
            <div class="row buttons">
                <div class="col-12 text-center">
                    <a
                        href="/cotizacion/datos-contacto"
                        class="btn btn-primary"
                    >
                        Anterior
                    </a>
                    <button
                        class="btn btn-primary"
                        onClick={handleClick}
                        disabled={selectedHour.length > 0 ? false : true}
                    >
                        Siguiente
                    </button>
                    <button
                        type="submit"
                        class="btn btn-primary submit-form d-none"
                        ref={buttonRef}
                    >
                        Siguiente
                    </button>
                </div>
            </div>
        </div>
    );
}
ReactDOM.render(<GolfCalendar />, document.getElementById("rootGolf"));
