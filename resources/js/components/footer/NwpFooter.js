import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { LogoCdsBlueWhite } from '../icons/LogoCds';
import { FacebookIcon, InstagramIcon, YouTubeIcon } from '../icons/SocialNetworks';
import { ArrowIcon } from '../icons/Arrows';
import { useLanguage, LanguageProvider } from '../context/LanguageProvider';

export default function NwpFooter() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        contactTitle: "Contáctanos",
        visitTitle: "Visítanos",
        subscribeTitle: "Suscríbete al Newsletter",
        subscribeButton: "Suscríbete",
        subscribeText: "Entérate de las novedades de la comunidad",
        phone1: "(507) 306-3700",
        phone2: "(507) 317-3799",
        email: "ciudaddelsaber@cdspanama.org",
        address: "Fundación Ciudad del Saber, Edificio 104, Calle Luis Bonilla, Clayton, Panamá",
        footerLinks: [
          { label: "Mapa de sitio", url: "#" },
          { label: "Términos y condiciones", url: "#" },
          { label: "Política de cookies", url: "#" },
        ],
        copyright: "© Copyright 2024. Todos los derechos reservados",
        menuOptions: [
          {
            label: 'Afíliate',
            url: '#',
            subOptions: [
              { label: 'Vincula tu organización', url: '#' },
              { label: 'Tipos de organización', url: '#' },
              { label: 'Directorio afiliados', url: '#' },
            ],
          },
          {
            label: 'Emprende',
            url: '#',
            subOptions: [
              { label: 'Centro de innovación', url: '#' },
              { label: 'Programas', url: '#' },
              { label: 'Directorio de startups y emprendedores', url: '#' },
              { label: 'Estudio global de emprendimiento', url: '#' },
            ],
          },
          {
            label: 'Reserva espacios',
            url: '#',
            subOptions: [
              { label: 'Eventos y reuniones', url: '#' },
              { label: 'Recreación y deporte', url: '#' },
            ],
          },
          {
            label: 'Enlaces de interés',
            url: '#',
            subOptions: [
              { label: 'Eventos', url: '#' },
              { label: 'Noticias', url: '#' },
              { label: 'Oportunidades', url: '#' },
            ],
          },
          {
            label: 'Portales y recursos',
            url: '#',
            subOptions: [
              { label: 'Portal clientes', url: '#' },
              { label: 'Portales emprendimiento', url: '#' },
              { label: 'Portal proveedores', url: '#' },
              { label: 'Recursos comunicaciones y prensa', url: '#' },
            ],
          },
        ]
      },
      en: {
        contactTitle: "Contact Us",
        visitTitle: "Visit Us",
        subscribeTitle: "Subscribe to the Newsletter",
        subscribeButton: "Subscribe",
        subscribeText: "Stay informed about community news",
        phone1: "(507) 306-3700",
        phone2: "(507) 317-3799",
        email: "ciudaddelsaber@cdspanama.org",
        address: "Ciudad del Saber Foundation, Building 104, Luis Bonilla Street, Clayton, Panama",
        footerLinks: [
          { label: "Site Map", url: "#" },
          { label: "Terms and Conditions", url: "#" },
          { label: "Cookie Policy", url: "#" },
        ],
        copyright: "© Copyright 2024. All rights reserved",
        menuOptions: [
          {
            label: 'Join Us',
            url: '#',
            subOptions: [
              { label: 'Connect Your Organization', url: '#' },
              { label: 'Types of Organizations', url: '#' },
              { label: 'Affiliate Directory', url: '#' },
            ],
          },
          {
            label: 'Entrepreneurship',
            url: '#',
            subOptions: [
              { label: 'Innovation Center', url: '#' },
              { label: 'Programs', url: '#' },
              { label: 'Startup and Entrepreneur Directory', url: '#' },
              { label: 'Global Entrepreneurship Study', url: '#' },
            ],
          },
          {
            label: 'Reserve Spaces',
            url: '#',
            subOptions: [
              { label: 'Events and Meetings', url: '#' },
              { label: 'Recreation and Sports', url: '#' },
            ],
          },
          {
            label: 'Useful Links',
            url: '#',
            subOptions: [
              { label: 'Events', url: '#' },
              { label: 'News', url: '#' },
              { label: 'Opportunities', url: '#' },
            ],
          },
          {
            label: 'Portals and Resources',
            url: '#',
            subOptions: [
              { label: 'Client Portal', url: '#' },
              { label: 'Entrepreneurship Portals', url: '#' },
              { label: 'Supplier Portal', url: '#' },
              { label: 'Communications and Press Resources', url: '#' },
            ],
          },
        ]
      }
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma

  const [openMenuIndex, setOpenMenuIndex] = useState(null);

  const handleMenuClick = (index) => {
    setOpenMenuIndex(openMenuIndex === index ? null : index);
  };

  return (
    <div className='w-full bg-black'>
      <div className='w-full grid grid-cols-10 h-6'>
        <div className='col-span-1 h-full bg-cdsblue'></div>
        <div className='col-span-1 h-full bg-cdsazuldark'></div>
        <div className='col-span-1 h-full bg-cdscian'></div>
        <div className='col-span-1 h-full bg-cdsgrisverde'></div>
        <div className='col-span-1 h-full bg-cdsyellow'></div>
        <div className='col-span-1 h-full bg-cdsorange'></div>
        <div className='col-span-1 h-full bg-cdsverde'></div>
        <div className='col-span-1 h-full bg-cdsgrisverdedark'></div>
        <div className='col-span-1 h-full bg-cdsrosa'></div>
        <div className='col-span-1 h-full bg-cdsrojo'></div>
      </div>
      <div className='nwp-padding-x-container'>
        <div className='md:pt-14 pt-6 pb-8 grid grid-flow-row md:grid-flow-col md:grid-cols-11 gap-y-6 md:gap-y-0 md:gap-x-4 nwp-container mx-auto'>
          <div className='col-span-2 -mt-6 '>
            <LogoCdsBlueWhite width={160} />
            <div className='w-full flex gap-x-4 mx-auto pl-2'>
              <a href='#'>
                <FacebookIcon className='fill-white w-10 h-10'/>
              </a>
              <a href='#'>
                <InstagramIcon className='fill-black w-10 h-10 hover:stroke-white stroke-white' />
              </a>
              <a href='#'>
                <YouTubeIcon className='fill-white w-10 h-10'/>
              </a>
            </div>
          </div>
          <div className='col-span-3 text-base text-gray-200 nwp-container'>
            <h6 className='font-semibold text-cdsblue'>{content.contactTitle}</h6>
            <div className='pt-4 flex flex-col gap-y-2'>
              <p>{content.phone1}</p>
              <p>{content.phone2}</p>
              <p>{content.email}</p>
            </div>
          </div>
          <div className='col-span-3 text-base text-gray-200'>
            <h6 className='font-semibold text-cdsblue'>{content.visitTitle}</h6>
            <div className='pt-4 flex flex-col gap-y-2'>
              <p>{content.address}</p>
            </div>
          </div>
          <div className='col-span-3 text-base text-gray-200'>
            <h6 className='font-semibold text-cdsblue'>{content.subscribeTitle}</h6>
            <div className='pt-4 flex flex-col gap-y-2'>
              <p>{content.subscribeText}</p>
              <button className='px-4 py-3 w-40 font-semibold rounded-xl bg-white hover:bg-gray-200 duration-150 text-black'>{content.subscribeButton}</button>
            </div>
          </div>
        </div>
        <div className='hidden md:grid grid-cols-5 nwp-container gap-x-4 nwpcontainer mx-auto py-8 border-t border-zinc-800'>
          {content.menuOptions && content.menuOptions.map((option, index) => (
            <div key={index} className='col-span-1 text-base text-gray-200'>
              <h6 className='font-semibold text-cdsblue '>{option.label}</h6>
              <div className='pt-4 flex flex-col gap-y-2'>
                {option.subOptions.map((subOption, subIndex) => (
                  <p key={subIndex}>
                    <a className='hover:text-white ' href={subOption.url}>{subOption.label}</a>
                  </p>
                ))}
              </div>
            </div>
          ))}
        </div>
        <ul className='flex flex-col gap-y-4 nwp-container font-semibold py-4 md:hidden border-y border-zinc-800'>
          {content.menuOptions && content.menuOptions.map((option, index) => (
            <li key={index}>
              <button
                className={`flex justify-between items-center w-full outline-none focus:outline-none ${openMenuIndex === index ? 'text-cdsblue' : 'text-cdsblue'}`}
                onClick={() => handleMenuClick(index)}
              >
                <span className={`text-start text-xl font-semibold text-cdsblue`}>{option.label}</span>
                {option.subOptions && <ArrowIcon color={`${openMenuIndex === index ? '#0088ff' : '#0088ff'}`} rotate={openMenuIndex === index} />}
              </button>
              <div className={`overflow-hidden transition-max-height duration-500 ease-in-out ${openMenuIndex === index ? 'max-h-screen' : 'max-h-0'}`}>
                {option.subOptions && (
                  <ul className='bg-black py-2 border-b border-zinc-800'>
                    {option.subOptions.map((subOption, subIndex) => (
                      <li key={subIndex}>
                        <a href={subOption.url} className='text-start block py-2 px-4 text-white'>
                          {subOption.label}
                        </a>
                      </li>
                    ))}
                  </ul>
                )}
              </div>
            </li>
          ))}
        </ul>
        <div className='flex flex-col nwp-container gap-y-2 md:gap-y-0 md:flex-row gap-x-2 md:gap-x-0 md:divide-x md:px-0 divide-white py-4 md:border-t border-zinc-800 nwpcontainer mx-auto'>
          {content.footerLinks && content.footerLinks.map((link, index) => (
            <a key={index} className='underline text-white hover:text-white px-2' href={link.url}>{link.label}</a>
          ))}
          <p className='text-white px-2'>{content.copyright}</p>      
        </div>
      </div>
    </div>
  );
}

const container = document.getElementById('nwp-footer');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <NwpFooter />
    </LanguageProvider>
  );
}