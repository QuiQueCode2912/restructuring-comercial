import React, { useState, useRef, useEffect } from 'react';
import ReactDOM from 'react-dom';
import LogoCds from '../icons/LogoCds';
import { ArrowIcon, ArrowIconRight } from '../icons/Arrows';

const menuOptions = [
  {
    label: 'Conócenos',
    url: '#',
    subOptions: [
      { label: 'Qué es ciudad del saber', url: '#' },
      { label: 'Historia', url: '#' },
      {
        label: 'Impacto',
        url: '#', // URL added
        subOptions: [
          { label: 'Académico', url: '#' },
          { label: 'Empresarial', url: '#' },
          { label: 'Humanitario', url: '#' },
          { label: 'Innovación y emprendimiento', url: '#' },
          { label: 'Proyecto país', url: '#' },
          { label: 'Sostenibilidad', url: '#' },
        ],
      },
      { label: 'Gobierno corporativo', url: '#' },
      { label: 'Cultura Organizacional', url: '#' },
      {
        label: 'Trabaja con nosotros',
        url: '#', // URL added
        subOptions: [
          { label: 'Vacantes de empleo', url: '#' },
          { label: 'Programas de pasantías', url: '#' },
        ],
      },
    ],
  },
  {
    label: 'Afíliate',
    url: '#',
    subOptions: [
      { label: 'Vincula tu organización', url: '#' },
      {
        label: 'Tipos de organizaciones',
        url: '#', // URL added
        subOptions: [
          { label: 'Empresa', url: '#' },
          { label: 'Programas académicos', url: '#' },
          { label: 'Organismos internacionales y ONG', url: '#' },
          { label: 'Entidades gubernamentales', url: '#' },
        ],
      },
      { label: 'Directorio de afiliados', url: '#' },
    ],
  },
  {
    label: 'Emprende',
    url: '#',
    subOptions: [
      { label: 'Centro de innovación', url: '#' },
      {
        label: 'Programas de startups y emprendedores',
        url: '#', // URL added
        subOptions: [
          { label: 'Innovar: Fase inicial', url: '#' },
          { label: 'Incubación y desarrollo', url: '#' },
          { label: 'Aceleración y crecimiento', url: '#' },
          { label: 'Programas con aliados', url: '#' },
          { label: 'Conviértete en miembro', url: '#' },
        ],
      },
      { label: 'Directorio startups y emprendedores', url: '#' },
      { label: 'Estudio global de emprendimiento', url: '#' },
      { label: 'Portales', url: '#' },
    ],
  },
  {
    label: 'Ven al campus',
    url: '#',
    subOptions: [
      { label: 'Conoce el campus', url: '#' },
      {
        label: 'La plaza',
        url: '#',
        subOptions: [
          { label: 'Oferta gastronómica', url: '#' },
          { label: 'Tiendas y servicios', url: '#' },
          { label: 'Mercado Urbano', url: '#' },
        ],
      },
      {
        label: 'Parque Ciudad del Saber',
        url: '#',
        subOptions: [
          { label: 'Piscina', url: '#' },
          { label: 'Canchas de baloncesto', url: '#' },
          { label: 'Cancha de golf', url: '#' },
          { label: 'Cancha de ráquetbol', url: '#' },
          { label: 'Cancha de tennis', url: '#' },
          { label: 'Cancha de voleibol', url: '#' },
          { label: 'Gimnasio', url: '#' },
          { label: 'Gazebos', url: '#' },
        ],
      },
      { label: 'Parque Los lagos', url: '#' },
      { label: 'Reserva Forestal', url: '#' },
      { label: 'Espacios convives', url: '#' },
      { label: 'Casa museo', url: '#' },
      { label: 'Centro de reciclaje', url: '#' },
    ],
  },
  {
    label: 'Reserva espacios',
    url: '#',
    subOptions: [
      {
        label: 'Espacios para recreación y deporte',
        url: '#', // URL added
        subOptions: [
          { label: 'Piscina', url: '#' },
          { label: 'Canchas de baloncesto', url: '#' },
          { label: 'Cancha de golf', url: '#' },
          { label: 'Cancha de ráquetbol', url: '#' },
          { label: 'Cancha de tennis', url: '#' },
          { label: 'Cancha de voleibol', url: '#' },
          { label: 'Gimnasio', url: '#' },
          { label: 'Gazebos', url: '#' },
        ],
      },
      {
        label: 'Espacios para eventos y reuniones',
        url: '#', // URL added
        subOptions: [
          { label: 'Teatro Ateneo', url: '#' },
          { label: 'Centro de convenciones', url: '#' },
          { label: 'Salas de reuniones', url: '#' },
          { label: 'Aulas', url: '#' },
          { label: 'Casa Museo', url: '#' },
          { label: 'Casa 39', url: '#' },
          { label: 'Auditorio Innova', url: '#' },
        ],
      },
      
    ],
  },
  { label: 'Eventos', url: '#' },
];


export default function NwpHeader() {
  const [openMenuIndex, setOpenMenuIndex] = useState(null);
  const [openSubMenuIndex, setOpenSubMenuIndex] = useState(null);
  const [menuHeight, setMenuHeight] = useState('auto');
  const [offsetRight, setOffsetRight] = useState(0);
  const mainMenuRef = useRef(null);
  const subMenuRef = useRef(null);
  const closeMenuTimeout = useRef(null);
  const subMenuOutOfBounds = useRef(false);

  const handleMenuMouseEnter = (index) => {
    clearTimeout(closeMenuTimeout.current);
    setOpenMenuIndex(index);
  };

  const handleMenuMouseLeave = () => {
    closeMenuTimeout.current = setTimeout(() => {
      setOpenMenuIndex(null);
      setOpenSubMenuIndex(null);
      setOffsetRight(0);
    }, 20);
  };

  const handleSubMenuMouseEnter = (index, hasSubMenu) => {
    clearTimeout(closeMenuTimeout.current);
    if (hasSubMenu) {
      setOpenSubMenuIndex(index);
    }
  };

  const handleSubMenuMouseLeave = () => {
    closeMenuTimeout.current = setTimeout(() => {
      setOpenSubMenuIndex(null);
    }, 0);
  };

  useEffect(() => {
    if (openMenuIndex !== null && mainMenuRef.current && subMenuRef.current) {
      const mainMenuHeight = mainMenuRef.current.clientHeight;
      const subMenuHeight = subMenuRef.current.clientHeight;
      setMenuHeight(`${Math.max(mainMenuHeight, subMenuHeight)}px`);

      const subMenuRect = subMenuRef.current.getBoundingClientRect();
      const viewportWidth = window.innerWidth;

      if (subMenuRect.right > viewportWidth) {
        setOffsetRight(subMenuRect.right - viewportWidth + 60);
        subMenuOutOfBounds.current = true;
      } else if (!subMenuOutOfBounds.current) {
        setOffsetRight(0);
      }
    } else {
      setMenuHeight('auto');
      setOffsetRight(0);
      subMenuOutOfBounds.current = false;
    }
  }, [openMenuIndex, openSubMenuIndex]);

  const isSubMenuOpen = openSubMenuIndex !== null;

  return (
    <header className='hidden md:block md:fixed md:top-0 md:left-0 md:right-0 md:z-50'>
      <div className='mx-auto py-2 bg-cdsblue px-8'>
        <div className='max-w-[1536px] mx-auto flex justify-end gap-x-8 divide-x divide-white'>
          <ul className='flex gap-x-8'>
            <li>
              <a className='text-white font-semibold' href='#'>Directorio</a>
            </li>
            <li>
              <a className='text-white font-semibold' href='#'>Noticias</a>
            </li>
            <li>
              <a className='text-white font-semibold' href='#'>Oportunidades</a>
            </li>
          </ul>
          <a className='text-white font-semibold pl-8' href='#'>Portal de clientes</a>
          <button className='text-white font-semibold pl-8' href='#'>🌍</button>
        </div>
      </div>
      <div className='bg-white mx-auto py-3'>
        <div className='max-w-[1536px] mx-auto flex items-center justify-between gap-x-8 z-20'>
          <LogoCds width={200} height={52.75} />
          <div className="hidden md:flex gap-x-4">
            {menuOptions.map((option, index) => (
              <div key={index} className="relative"
                onMouseEnter={() => handleMenuMouseEnter(index)}
                onMouseLeave={handleMenuMouseLeave}
              >
                <a href={option.url} className={`font-semibold flex transition-colors hover:text-cdsblue duration-200 ${openMenuIndex === index ? 'text-cdsblue' : 'text-gray-800'}`}>
                  {option.label}
                  {option.subOptions && <ArrowIcon color={openMenuIndex === index ? '#0088ff' : '#000'} className='ml-1 w-5 h-5' rotate={openMenuIndex === index} />}
                </a>

                {openMenuIndex === index && option.subOptions && (
                  <ul ref={mainMenuRef} style={{ height: menuHeight, right: offsetRight }} className={`absolute top-0 right-0 mt-7 bg-gray-100 rounded-l-lg py-6 min-w-96 flex flex-col z-50 transition-all duration-300 ${isSubMenuOpen ? 'rounded-r-none' : 'rounded-r-lg'}`}>
                    {option.subOptions.map((subOption, subIndex) => (
                      <li className="group flex w-full" key={subIndex}
                        onMouseEnter={() => handleSubMenuMouseEnter(subIndex, subOption.subOptions)}
                        onMouseLeave={handleSubMenuMouseLeave}
                      >
                        <a href={subOption.url} className="font-semibold w-full flex items-center justify-between transition-colors duration-200 group-hover:bg-white pl-4 hover:no-underline">
                          <div className="flex items-center justify-between py-2 group-hover:text-black w-full">
                            {subOption.label}
                            {subOption.subOptions && <ArrowIconRight className="w-5 h-5 ml-2" />}
                          </div>
                          <div className="min-h-5 h-full w-2 group-hover:bg-cdsblue transition-colors duration-200"></div>
                        </a>

                        {openSubMenuIndex === subIndex && subOption.subOptions && (
                          <ul ref={subMenuRef} style={{ height: menuHeight }} className="absolute top-0 left-full mt-0 bg-white border-y border-r border-gray-100 rounded-r-lg py-6 min-w-96 flex flex-col z-50 transition-all duration-300">
                            {subOption.subOptions.map((subSubOption, subSubIndex) => (
                              <li className="group flex w-full" key={subSubIndex}>
                                <a href={subSubOption.url} className="font-semibold w-full flex items-center justify-between transition-colors duration-200 group-hover:bg-white pl-4 hover:no-underline">
                                  <div className="flex items-center justify-between py-2 group-hover:text-black w-full">
                                    {subSubOption.label}
                                  </div>
                                </a>
                              </li>
                            ))}
                          </ul>
                        )}
                      </li>
                    ))}
                  </ul>
                )}
              </div>
            ))}
          </div>
        </div>
      </div>
    </header>
  );
}

if (document.getElementById('nwp-header')) {
  ReactDOM.render(<NwpHeader />, document.getElementById('nwp-header'));
}
