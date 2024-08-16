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
      { label: 'Vincula tu organización', url: '#', arrow: true },
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
  // Estado para rastrear qué menú principal está abierto
  const [openMenuIndex, setOpenMenuIndex] = useState(null);
  
  // Estado para rastrear qué submenú está abierto
  const [openSubMenuIndex, setOpenSubMenuIndex] = useState(null);
  
  // Referencia para el timeout que cierra el menú después de un tiempo
  const closeTimeoutRef = useRef(null);
  
  // Referencia al menú para ajustar la posición si se sale de la pantalla
  const menuRef = useRef(null);
  
  // Referencia al submenú para manejar su visibilidad
  const subMenuRef = useRef(null);

  // Función que se llama cuando se hace clic en un menú
  const handleMenuClick = (index) => {
    clearTimeout(closeTimeoutRef.current); // Limpiar cualquier timeout activo
    if (openMenuIndex === index) {
      // Si se hace clic en un menú ya abierto, se cierra
      setOpenMenuIndex(null);
      setOpenSubMenuIndex(null);
    } else {
      // Si se hace clic en un menú diferente, se abre
      setOpenMenuIndex(index);
      setOpenSubMenuIndex(null);
    }
  };

  // Función que se llama cuando el mouse entra en un menú principal
  const handleMouseEnter = (index) => {
    clearTimeout(closeTimeoutRef.current); // Limpiar cualquier timeout activo
    setOpenMenuIndex(index); // Abrir el menú correspondiente
    setOpenSubMenuIndex(null); // Cerrar cualquier submenú abierto
  };

  // Función que se llama cuando el mouse sale del menú
  const handleMouseLeave = () => {
    // Establecer un timeout para cerrar el menú después de un pequeño retraso
    closeTimeoutRef.current = setTimeout(() => {
      setOpenMenuIndex(null);
      setOpenSubMenuIndex(null);
    }, 100); // 50 ms de retraso para permitir la navegación
  };

  const handleMouseLeave1 = () => {
    
      setOpenMenuIndex(null);
      setOpenSubMenuIndex(null);

  };

  // Función que se llama cuando el mouse entra en un submenú
  const handleSubMenuEnter = (index) => {
    clearTimeout(closeTimeoutRef.current); // Limpiar cualquier timeout activo
    setOpenSubMenuIndex(index); // Abrir el submenú correspondiente
  };

  // Función que se llama cuando el mouse sale de un submenú
  const handleSubMenuLeave = () => {
    // Establecer un timeout para cerrar el submenú después de un retraso
    closeTimeoutRef.current = setTimeout(() => {
      setOpenSubMenuIndex(null);
    }, 100); // 100 ms de retraso
  };

  // Efecto que ajusta la posición del menú si se sale de la pantalla
  useEffect(() => {
    if (menuRef.current) {
      const rect = menuRef.current.getBoundingClientRect();
      const overflowRight = rect.right > window.innerWidth - 40;
      if (overflowRight) {
        // Si el menú se sale por la derecha, ajustarlo
        menuRef.current.style.left = `-${rect.right - window.innerWidth + 120}px`;
      } else {
        // Posición normal del menú
        menuRef.current.style.left = `-80px`;
      }
    }
  }, [openMenuIndex]); // Efecto se dispara cuando openMenuIndex cambia

  return (
    <>
      <header className='hidden lg:block fixed top-0 left-0 right-0 z-20 h-[120px]'>
        {/* Contenedor superior con opciones de navegación y portal */}
        <div className='mx-auto bg-cdsblue h-12 px-8'>
          <div className='nwp-container mx-auto h-full flex items-center justify-end gap-x-8 divide-x divide-white'>
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
        {/* Contenedor principal con logo y menú */}
        <div className='bg-white border-b border-cdsgray600 mx-auto h-[72px] px-8'>
          <div className='nwp-container mx-auto bg-white h-full flex items-center justify-between z-20'>
            <LogoCds width={160} height={48} />
            <div className="flex h-full items-center gap-x-4 lg:gap-x-8">
              <nav>
                <ul className="flex gap-x-4">
                  {menuOptions.map((option, index) => (
                    <li 
                      key={index} 
                      className="relative"
                      onMouseEnter={() => handleMouseEnter(index)}
                      onMouseLeave={handleMouseLeave1}
                    >
                      {option.subOptions ? (
                        <button 
                          onClick={() => handleMenuClick(index)} 
                          className={`focus:outline-none group font-semibold flex items-center transition-colors hover:text-cdsblue h-full duration-200 z-20 ${openMenuIndex === index ? 'text-cdsblue ' : 'text-gray-800'}`}
                        >
                          {option.label}
                          <ArrowIcon color={openMenuIndex === index ? '#0088ff' : '#000'} className='w-5 h-5 group-hover:fill-cdsblue' rotate={openMenuIndex === index} />
                        </button>
                      ) : (
                        <a 
                          href={option.url} 
                          className="text-gray-800 font-semibold hover:no-underline hover:text-cdsblue transition-colors duration-200 h-full flex items-center"
                        >
                          {option.label}
                        </a>
                      )}
                      {openMenuIndex === index && option.subOptions && (
                        <div 
                          ref={menuRef}
                          onMouseEnter={() => clearTimeout(closeTimeoutRef.current)}
                          onMouseLeave={handleMouseLeave}
                          className='absolute z-10 pt-2'
                        >
                          <div className='flex w-[800px] rounded-md overflow-hidden bg-white border border-cdsgray600 '>
                            
                            {/* Menú de opciones secundarias */}
                            <ul className="w-1/2 py-6 bg-cdsgray700">
                              {option.subOptions.map((subOption, subIndex) => (
                                <li 
                                  key={subIndex} 
                                  className="hover:bg-white h-12 font-semibold flex items-center justify-between group"
                                  onMouseEnter={() => handleSubMenuEnter(subIndex)}
                                  onMouseLeave={handleSubMenuLeave}
                                >
                                  {subOption.url ? (
                                    <a href={subOption.url} className="flex items-center justify-between px-4  hover:no-underline h-full w-full hover:text-black border-r-8 border-cdsgray700 hover:border-cdsblue">
                                      {subOption.label}
                                      {subOption.arrow && <ArrowWhitBg className="rounded-full bg-cdsblue p-1 h-8 w-8" />}
                                      {subOption.external && <RedirectArrow className=" h-6 w-6" />}
                                    </a>
                                  ) : (
                                    <div className='flex items-center justify-between px-4 h-full w-full hover:text-black border-r-8 border-cdsgray700 hover:border-cdsblue'>
                                      <span className=''>{subOption.label}</span>
                                      {subOption.subOptions && <ArrowIconRight className="ml-2 h-6 w-6" />}
                                    </div>
                                  )}
                                </li>
                              ))}
                            </ul>
                            {/* Submenú de tercer nivel */}
                            <div 
                              className="w-1/2 bg-cdsgray200 py-4"
                              onMouseEnter={() => clearTimeout(closeTimeoutRef.current)}
                              onMouseLeave={handleSubMenuLeave}
                              ref={subMenuRef}
                            >
                              {openSubMenuIndex !== null && option.subOptions[openSubMenuIndex].subOptions && (
                                <ul>
                                  {option.subOptions[openSubMenuIndex].subOptions.map((subOption, subIndex) => (
                                    <li key={subIndex} className="h-12 font-semibold bg-white  flex items-center justify-between">
                                      <a href={subOption.url} className="flex items-center px-4 h-full w-full hover:bg-cdsgray600 hover:no-underline hover:text-black">
                                        {subOption.label}
                                        {subOption.arrow && <ArrowWhitBg className="ml-2 rounded-full bg-cdsblue p-1 h-8 w-8" />}
                                      </a>
                                    </li>
                                  ))}
                                </ul>
                              )}
                            </div>

                          </div>
                        </div>
                      )}
                    </li>
                  ))}
                </ul>
              </nav>
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