import React, { useState, useRef, useEffect } from 'react';
import { createRoot } from 'react-dom/client';
import LogoCds from '../icons/LogoCds';
import { ArrowIcon, ArrowIconRight, ArrowWhitBg, RedirectArrow } from '../icons/Arrows';
import NwpMobileHeader from './NwpMobileHeader';

const menuOptions = [
  {
    label: 'Conócenos',
    subOptions: [
      { label: 'Qué es Ciudad del Saber', url: 'https://tailwindcss.com' },
      { label: 'Historia', url: '#' },
      {
        label: 'Impacto',
        subOptions: [
          { label: 'Ir a Impacto', url: '#', arrow: true },
          { label: 'Académico', url: 'https://tailwindcss.com/docs/container' },
          { label: 'Empresarial', url: '#' },
          { label: 'Humanitario', url: '#' },
          { label: 'Innovación y emprendimiento', url: '#' },
          { label: 'Proyecto País', url: '#' },
          { label: 'Sostenibilidad', url: '#' },
        ],
      },
      {
        label: 'Fundación Ciudad del Saber',
        subOptions: [
          { label: 'Gobierno corporativo', url: '#' },
          { label: 'Cultura organizacional', url: '#' },
          { label: 'Sé parte del equipo', url: '#' },
          { label: 'Programas de pasantías', url: '#' },
        ],
      },
      { label: 'Publicaciones', url: '#', external: true },
    ],
  },
  {
    label: 'Afíliate',
    subOptions: [
      { label: 'Vincula tu organización', url: '#' },
      {
        label: 'Tipos de organizaciones',
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
    subOptions: [
      { label: 'Ir a Centro de Innovación', url: '#', arrow: true },
      { label: 'Conviértete en miembro', url: '#' },
      {
        label: 'Programas de startups y emprendedores',
        subOptions: [
          { label: 'Programa Innovar', url: '#' },
          { label: 'Canal de Empresarias', url: '#' },
          { label: 'Incubación de startups', url: '#' },
          { label: 'Aceleración de startups', url: '#' },
          { label: 'Emprendimientos avanzados', url: '#' },
        ],
      },
      { label: 'Directorio startups y emprendedores', url: '#' },
      { label: 'Estudio Global de Emprendimiento', url: '#' },
      { label: 'Portal Aprende en Ciudad del Saber', url: '#', external: true },
    ],
  },
  {
    label: 'Ven al Campus',
    subOptions: [
      { label: 'Conoce el Campus', url: '#' },
      {
        label: 'La Plaza',
        subOptions: [
          { label: 'Ir a La Plaza', url: '#', arrow: true },
          { label: 'Oferta gastronómica y servicios comerciales', url: '#' },
          { label: 'Mercado Urbano', url: '#' },
        ],
      },
      {
        label: 'Parque Ciudad del Saber',
        subOptions: [
          { label: 'Ir a Parque Ciudad del Saber', url: '#', arrow: true },
          { label: 'Piscina', url: '#' },
          { label: 'Canchas de baloncesto', url: '#' },
          { label: 'Cancha de golf', url: '#' },
          { label: 'Cancha de ráquetbol', url: '#' },
          { label: 'Cancha de tenis', url: '#' },
          { label: 'Cancha de voleibol', url: '#' },
          { label: 'Gimnasio', url: '#' },
          { label: 'Gazebos', url: '#' },
        ],
      },
      { label: 'Parque Los Lagos', url: '#' },
      { label: 'Reserva Forestal', url: '#' },
      { label: 'Espacios convivies', url: '#' },
      { label: 'Casa Museo', url: '#' },
      { label: 'Centro de Reciclaje', url: '#' },
    ],
  },
  {
    label: 'Reserva Espacios',
    subOptions: [
      {
        label: 'Espacios para eventos y reuniones',
        subOptions: [
          { label: 'Ir a Espacios para eventos y reuniones', url: '#', arrow: true },
          { label: 'Teatro Ateneo', url: '#' },
          { label: 'Centro de Convenciones', url: '#' },
          { label: 'Salas de reuniones', url: '#' },
          { label: 'Aulas', url: '#' },
          { label: 'Casa Museo', url: '#' },
          { label: 'Casa 39', url: '#' },
          { label: 'Auditorio Innova', url: '#' },
        ],
      },
      {
        label: 'Espacios para recreación y deporte',
        subOptions: [
          { label: 'Ir a Parque Ciudad del Saber', url: '#', arrow: true },
          { label: 'Piscina', url: '#' },
          { label: 'Canchas de baloncesto', url: '#' },
          { label: 'Cancha de golf', url: '#' },
          { label: 'Cancha de ráquetbol', url: '#' },
          { label: 'Cancha de tenis', url: '#' },
          { label: 'Cancha de voleibol', url: '#' },
          { label: 'Gimnasio', url: '#' },
          { label: 'Gazebos', url: '#' },
        ],
      },
    ],
  },
  { label: 'Eventos', url: '#' },
];


export default function NwpHeader() {
  const [openMenuIndex, setOpenMenuIndex] = useState(null);
  const [openSubMenuIndex, setOpenSubMenuIndex] = useState(null);
  const mainMenuRef = useRef(null);

  const handleMenuClick = (index) => {
    setOpenMenuIndex(prevIndex => (prevIndex === index ? null : index));
    setOpenSubMenuIndex(null);
  };

  const handleSubMenuClick = (index, hasSubMenu, event) => {
    if (hasSubMenu) {
      event.preventDefault();
      setOpenSubMenuIndex(prevIndex => (prevIndex === index ? null : index));
    }
  };

  useEffect(() => {
    function handleClickOutside(event) {
      if (mainMenuRef.current && !mainMenuRef.current.contains(event.target)) {
        setOpenMenuIndex(null);
        setOpenSubMenuIndex(null);
      }
    }

    document.addEventListener('mousedown', handleClickOutside);
    return () => {
      document.removeEventListener('mousedown', handleClickOutside);
    };
  }, [mainMenuRef]);

  useEffect(() => {
    if (openMenuIndex !== null) {
      const menuElement = mainMenuRef.current;
      const rect = menuElement.getBoundingClientRect();
      if (rect.right > window.innerWidth) {
        menuElement.style.transform = `translateX(-${rect.right - window.innerWidth + 80}px)`;
      } else {
        menuElement.style.transform = 'translateX(0)';
      }
    }
  }, [openMenuIndex]);

  return (
    <>
      <header className='hidden md:block md:fixed md:top-0 md:left-0 md:right-0 md:z-20 h-[120px]'>
        <div className='mx-auto bg-cdsblue  h-12 px-8'>
          <div className='nwp-container mx-auto h-full flex  items-center justify-end gap-x-8 divide-x divide-white'>
            <ul className='flex gap-x-8'>
              <li>
                <a className='text-white font-semibold ' href='#'>Directorio</a>
              </li>
              <li>
                <a className='text-white font-semibold ' href='#'>Noticias</a>
              </li>
              <li>
                <a className='text-white font-semibold ' href='#'>Oportunidades</a>
              </li>
            </ul>
            <a className='text-white font-semibold  pl-8' href='#'>Portal de clientes</a>
            <button className='text-white font-semibold  pl-8'>🌍</button>
          </div>
        </div>
        <div className='bg-white mx-auto h-[72px] px-8'>
          <div className='nwp-container mx-auto h-full flex items-center justify-between  z-20'>
            <LogoCds width={180} height={48} />
            <div className="flex h-full  items-center gap-x-4 xl:gap-x-8 ">
              {menuOptions.map((option, index) => (
                <div key={index} className="relative">
                  {!option.subOptions ? (
                    <a
                      href={option.url}
                      className={`font-semibold flex transition-colors hover:no-underline hover:text-cdsblue h-full duration-200 z-20 ${openMenuIndex === index ? 'text-cdsblue' : 'text-gray-800'}`}
                    >
                      {option.label}
                    </a>
                  ) : (
                    <button
                      className={`focus:outline-none group font-semibold flex items-center transition-colors hover:text-cdsblue h-full duration-200 z-20 ${openMenuIndex === index ? 'text-cdsblue ' : 'text-gray-800'}`}
                      onClick={() => handleMenuClick(index)}
                    >
                      {option.label}
                      <ArrowIcon color={openMenuIndex === index ? '#0088ff' : '#000'} className='w-5 h-5 group-hover:fill-cdsblue' rotate={openMenuIndex === index} />
                    </button>
                  )}

                  {openMenuIndex === index && (
                    <div 
                      className="absolute top-0 border border-cdsgray600 rounded-lg overflow-hidden mt-7 flex w-[800px] transition-transform duration-300 z-50"
                      ref={mainMenuRef}
                    >
                      <ul className='bg-cdsgray700 py-6 w-1/2 flex flex-col '>
                        {option.subOptions.map((subOption, subIndex) => (
                          <li className="group w-full" key={subIndex}>
                            {!subOption.subOptions ? (
                              <a
                                href={subOption.url}
                                className="font-semibold w-full h-12 flex items-center text-start justify-between transition-colors duration-200 group-hover:bg-white px-6 hover:border-r-8 border-cdsblue hover:no-underline"
                              >
                                <div className="flex items-center justify-between text-start h-12 py-2 group-hover:text-black w-full">
                                  {subOption.label}
                                  {subOption.external && ( <RedirectArrow className="h-8 w-8 text-black pl-2" />)}
                                </div>
                              </a>
                            ) : (
                              <button
                                className="focus:outline-none font-semibold w-full text-start h-12 flex items-center justify-between transition-colors duration-200 group-hover:bg-white px-6 hover:border-r-8 border-cdsblue hover:no-underline"
                                onClick={(event) => handleSubMenuClick(subIndex, subOption.subOptions, event)}
                              >
                                <div className="flex items-center h-12 justify-between py-2 group-hover:text-black w-full">
                                  {subOption.label}
                                  <ArrowIconRight className="w-5 h-5 ml-2" />
                                </div>
                              </button>
                            )}
                          </li>
                        ))}
                      </ul>
                      {openSubMenuIndex !== null ? (
                          <ul className=" border-gray-100   bg-white py-6 w-1/2 flex flex-col transition-all duration-300">
                            {menuOptions[openMenuIndex].subOptions[openSubMenuIndex].subOptions.map((subSubOption, subSubIndex) => (
                              <li className="group flex w-full" key={subSubIndex}>
                                <a
                                  href={subSubOption.url}
                                  className="font-semibold w-full flex items-center justify-between transition-colors duration-75 group-hover:bg-cdsgray600 px-6 hover:no-underline"
                                  onClick={(event) => event.stopPropagation()}
                                >
                                  <div className={`flex items-center group-hover:text-black w-full ${subSubOption.arrow ? 'h-[72px]' : 'h-12'}`}>
                                    {subSubOption.label}
                                    {subSubOption.arrow && (
                                      <div className="h-8 w-8 ml-2 bg-cdsblue rounded-full grid place-content-center">
                                        <ArrowWhitBg className="h-6 w-6" />
                                      </div>
                                    )}
                                  </div>
                                </a>
                              </li>
                            ))}
                          </ul>
                        ) : (
                          <div className="border-gray-100  bg-white py-6 w-1/2  min-w-96 flex flex-col z-50 transition-all duration-300">
                            
                          </div>
                        )}
                    </div>
                  )}
                </div>
              ))}
            </div>
          </div>
        </div>
      </header>
      <NwpMobileHeader menuOptions={menuOptions} />
    </>
  );
}

const container = document.getElementById('nwp-header');
if (container) {
  const root = createRoot(container);
  root.render(<NwpHeader />);
}