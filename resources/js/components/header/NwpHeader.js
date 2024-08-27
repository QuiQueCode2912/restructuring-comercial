import React, { useState, useRef, useEffect } from 'react';
import { createRoot } from 'react-dom/client';
import LogoCds from '../icons/LogoCds';
import { ArrowIcon, ArrowIconRight, ArrowWhitBg, RedirectArrow } from '../icons/Arrows';
import NwpMobileHeader from './NwpMobileHeader';
import { LanguageProvider, useLanguage } from '../context/LanguageProvider';
import LanguageSelect from './LanguageSelect';

export default function NwpHeader() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado

  // Definir las traducciones para los textos
  const translations = {
    es: {
      directory: 'Directorio',
      news: 'Noticias',
      opportunities: 'Oportunidades',
      clientPortal: 'Portal de clientes',
    },
    en: {
      directory: 'Directory',
      news: 'News',
      opportunities: 'Opportunities',
      clientPortal: 'Client Portal',
    },
  };

  const menuOptions = [
    {
      label: language === 'es' ? 'Conócenos' : 'About Us',
      subOptions: [
        { label: language === 'es' ? 'Qué es Ciudad del Saber' : 'What is Ciudad del Saber', url: 'https://tailwindcss.com' },
        { label: language === 'es' ? 'Historia' : 'History', url: '#' },
        {
          label: language === 'es' ? 'Impacto' : 'Impact',
          subOptions: [
            { label: language === 'es' ? 'Ir a Impacto' : 'Go to Impact', url: '#', arrow: true },
            { label: language === 'es' ? 'Académico' : 'Academic', url: 'https://tailwindcss.com/docs/container' },
            { label: language === 'es' ? 'Empresarial' : 'Business', url: '#' },
            { label: language === 'es' ? 'Humanitario' : 'Humanitarian', url: '#' },
            { label: language === 'es' ? 'Innovación y emprendimiento' : 'Innovation and Entrepreneurship', url: '#' },
            { label: language === 'es' ? 'Proyecto País' : 'Country Project', url: '#' },
            { label: language === 'es' ? 'Sostenibilidad' : 'Sustainability', url: '#' },
          ],
        },
        {
          label: language === 'es' ? 'Fundación Ciudad del Saber' : 'Ciudad del Saber Foundation',
          subOptions: [
            { label: language === 'es' ? 'Gobierno corporativo' : 'Corporate Governance', url: '#' },
            { label: language === 'es' ? 'Cultura organizacional' : 'Organizational Culture', url: '#' },
            { label: language === 'es' ? 'Sé parte del equipo' : 'Join the Team', url: '#' },
            { label: language === 'es' ? 'Programas de pasantías' : 'Internship Programs', url: '#' },
          ],
        },
        { label: language === 'es' ? 'Publicaciones' : 'Publications', url: '#', external: true },
      ],
    },
    {
      label: language === 'es' ? 'Afíliate' : 'Join Us',
      subOptions: [
        { label: language === 'es' ? 'Vincula tu organización' : 'Link Your Organization', url: '#', arrow: true },
        {
          label: language === 'es' ? 'Tipos de organizaciones' : 'Types of Organizations',
          subOptions: [
            { label: language === 'es' ? 'Empresa' : 'Company', url: '#' },
            { label: language === 'es' ? 'Programas académicos' : 'Academic Programs', url: '#' },
            { label: language === 'es' ? 'Organismos internacionales y ONG' : 'International Organizations and NGOs', url: '#' },
            { label: language === 'es' ? 'Entidades gubernamentales' : 'Government Entities', url: '#' },
          ],
        },
        { label: language === 'es' ? 'Directorio de afiliados' : 'Affiliate Directory', url: '#' },
      ],
    },
    {
      label: language === 'es' ? 'Emprende' : 'Entrepreneurship',
      subOptions: [
        { label: language === 'es' ? 'Ir a Centro de Innovación' : 'Go to Innovation Center', url: '#', arrow: true },
        { label: language === 'es' ? 'Conviértete en miembro' : 'Become a Member', url: '#' },
        {
          label: language === 'es' ? 'Programas de startups y emprendedores' : 'Startup and Entrepreneur Programs',
          subOptions: [
            { label: language === 'es' ? 'Programa Innovar' : 'Innovate Program', url: '#' },
            { label: language === 'es' ? 'Canal de Empresarias' : 'Women Entrepreneurs Channel', url: '#' },
            { label: language === 'es' ? 'Incubación de startups' : 'Startup Incubation', url: '#' },
            { label: language === 'es' ? 'Aceleración de startups' : 'Startup Acceleration', url: '#' },
            { label: language === 'es' ? 'Emprendimientos avanzados' : 'Advanced Ventures', url: '#' },
          ],
        },
        { label: language === 'es' ? 'Directorio startups y emprendedores' : 'Startup and Entrepreneur Directory', url: '#' },
        { label: language === 'es' ? 'Estudio Global de Emprendimiento' : 'Global Entrepreneurship Study', url: '#' },
        { label: language === 'es' ? 'Portal Aprende en Ciudad del Saber' : 'Learn at Ciudad del Saber Portal', url: '#', external: true },
      ],
    },
    {
      label: language === 'es' ? 'Ven al Campus' : 'Visit the Campus',
      subOptions: [
        { label: language === 'es' ? 'Conoce el Campus' : 'Explore the Campus', url: '#' },
        {
          label: language === 'es' ? 'La Plaza' : 'The Plaza',
          subOptions: [
            { label: language === 'es' ? 'Ir a La Plaza' : 'Go to The Plaza', url: '#', arrow: true },
            { label: language === 'es' ? 'Oferta gastronómica y servicios comerciales' : 'Gastronomic and Commercial Services', url: '#' },
            { label: language === 'es' ? 'Mercado Urbano' : 'Urban Market', url: '#' },
          ],
        },
        {
          label: language === 'es' ? 'Parque Ciudad del Saber' : 'Ciudad del Saber Park',
          subOptions: [
            { label: language === 'es' ? 'Ir a Parque Ciudad del Saber' : 'Go to Ciudad del Saber Park', url: '#', arrow: true },
            { label: language === 'es' ? 'Piscina' : 'Swimming Pool', url: '#' },
            { label: language === 'es' ? 'Canchas de baloncesto' : 'Basketball Courts', url: '#' },
            { label: language === 'es' ? 'Cancha de golf' : 'Golf Course', url: '#' },
            { label: language === 'es' ? 'Cancha de ráquetbol' : 'Racquetball Court', url: '#' },
            { label: language === 'es' ? 'Cancha de tenis' : 'Tennis Court', url: '#' },
            { label: language === 'es' ? 'Cancha de voleibol' : 'Volleyball Court', url: '#' },
            { label: language === 'es' ? 'Gimnasio' : 'Gym', url: '#' },
            { label: language === 'es' ? 'Gazebos' : 'Gazebos', url: '#' },
          ],
        },
        { label: language === 'es' ? 'Parque Los Lagos' : 'Los Lagos Park', url: '#' },
        { label: language === 'es' ? 'Reserva Forestal' : 'Forest Reserve', url: '#' },
        { label: language === 'es' ? 'Espacios convivies' : 'Gathering Spaces', url: '#' },
        { label: language === 'es' ? 'Casa Museo' : 'Museum House', url: '#' },
        { label: language === 'es' ? 'Centro de Reciclaje' : 'Recycling Center', url: '#' },
      ],
    },
    {
      label: language === 'es' ? 'Reserva Espacios' : 'Reserve Spaces',
      subOptions: [
        {
          label: language === 'es' ? 'Espacios para eventos y reuniones' : 'Event and Meeting Spaces',
          subOptions: [
            { label: language === 'es' ? 'Ir a Espacios para eventos y reuniones' : 'Go to Event and Meeting Spaces', url: '#', arrow: true },
            { label: language === 'es' ? 'Teatro Ateneo' : 'Ateneo Theater', url: '#' },
            { label: language === 'es' ? 'Centro de Convenciones' : 'Convention Center', url: '#' },
            { label: language === 'es' ? 'Salas de reuniones' : 'Meeting Rooms', url: '#' },
            { label: language === 'es' ? 'Aulas' : 'Classrooms', url: '#' },
            { label: language === 'es' ? 'Casa Museo' : 'Museum House', url: '#' },
            { label: language === 'es' ? 'Casa 39' : 'House 39', url: '#' },
            { label: language === 'es' ? 'Auditorio Innova' : 'Innova Auditorium', url: '#' },
          ],
        },
        {
          label: language === 'es' ? 'Espacios para recreación y deporte' : 'Recreation and Sports Spaces',
          subOptions: [
            { label: language === 'es' ? 'Ir a Parque Ciudad del Saber' : 'Go to Ciudad del Saber Park', url: '#', arrow: true },
            { label: language === 'es' ? 'Piscina' : 'Swimming Pool', url: '#' },
            { label: language === 'es' ? 'Canchas de baloncesto' : 'Basketball Courts', url: '#' },
            { label: language === 'es' ? 'Cancha de golf' : 'Golf Course', url: '#' },
            { label: language === 'es' ? 'Cancha de ráquetbol' : 'Racquetball Court', url: '#' },
            { label: language === 'es' ? 'Cancha de tenis' : 'Tennis Court', url: '#' },
            { label: language === 'es' ? 'Cancha de voleibol' : 'Volleyball Court', url: '#' },
            { label: language === 'es' ? 'Gimnasio' : 'Gym', url: '#' },
            { label: language === 'es' ? 'Gazebos' : 'Gazebos', url: '#' },
          ],
        },
      ],
    },
    { label: language === 'es' ? 'Eventos' : 'Events', url: '#' },
  ];

  // Estados y lógica de manejo de menús
  const [openMenuIndex, setOpenMenuIndex] = useState(null);
  const [openSubMenuIndex, setOpenSubMenuIndex] = useState(null);
  const closeTimeoutRef = useRef(null);
  const menuRef = useRef(null);
  const subMenuRef = useRef(null);

  const handleMenuClick = (index) => {
    clearTimeout(closeTimeoutRef.current);
    if (openMenuIndex === index) {
      setOpenMenuIndex(null);
      setOpenSubMenuIndex(null);
    } else {
      setOpenMenuIndex(index);
      setOpenSubMenuIndex(null);
    }
  };

  const handleMouseEnter = (index) => {
    clearTimeout(closeTimeoutRef.current);
    setOpenMenuIndex(index);
    setOpenSubMenuIndex(null);
  };

  const handleMouseLeave = () => {
    closeTimeoutRef.current = setTimeout(() => {
      setOpenMenuIndex(null);
      setOpenSubMenuIndex(null);
    }, 100);
  };

  const handleMouseLeave1 = () => {
    setOpenMenuIndex(null);
    setOpenSubMenuIndex(null);
  };

  const handleSubMenuEnter = (index) => {
    clearTimeout(closeTimeoutRef.current);
    setOpenSubMenuIndex(index);
  };

  const handleSubMenuLeave = () => {
    closeTimeoutRef.current = setTimeout(() => {
      setOpenSubMenuIndex(null);
    }, 100);
  };

  useEffect(() => {
    if (menuRef.current) {
      const rect = menuRef.current.getBoundingClientRect();
      const overflowRight = rect.right > window.innerWidth - 40;
      if (overflowRight) {
        menuRef.current.style.left = `-${rect.right - window.innerWidth + 120}px`;
      } else {
        menuRef.current.style.left = `-80px`;
      }
    }
  }, [openMenuIndex]);

  return (
    <>
      <header className='hidden lg:block fixed top-0 left-0 right-0 z-20 h-[120px]'>
        {/* Contenedor superior con opciones de navegación y portal */}
        <div className='mx-auto bg-cdsblue h-12 px-8'>
          <div className='nwp-container mx-auto h-full flex items-center justify-end gap-x-8 divide-x divide-white'>
            <ul className='flex gap-x-8'>
              <li>
                <a className='text-white font-semibold ' href='#'>
                  {translations[language].directory}
                </a>
              </li>
              <li>
                <a className='text-white font-semibold ' href='#'>
                  {translations[language].news}
                </a>
              </li>
              <li>
                <a className='text-white font-semibold ' href='#'>
                  {translations[language].opportunities}
                </a>
              </li>
            </ul>
            <a className='text-white font-semibold pl-8' href='#'>
              {translations[language].clientPortal}
            </a>
            <LanguageSelect />
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
                                    <a href={subOption.url} className="flex items-center justify-between px-4 hover:no-underline h-full w-full hover:text-black border-r-8 border-cdsgray700 hover:border-cdsblue">
                                      {subOption.label}
                                      {subOption.arrow && <ArrowWhitBg className="rounded-full bg-cdsblue p-1 h-8 w-8" />}
                                      {subOption.external && <RedirectArrow className="h-6 w-6" />}
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
                                    <li key={subIndex} className="h-12 font-semibold bg-white flex items-center justify-between">
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
  root.render(
    <LanguageProvider>
      <NwpHeader />
    </LanguageProvider>
  );
}
