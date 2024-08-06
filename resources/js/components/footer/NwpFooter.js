import React, { useState } from 'react';
import { createRoot } from 'react-dom/client';
import { LogoCdsBlueWhite } from '../icons/LogoCds';
import { FacebookIcon, InstagramIcon, YouTubeIcon } from '../icons/SocialNetworks';
import { ArrowIcon } from '../icons/Arrows';

export default function NwpFooter() {
  const menuOptions = [
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
  ];

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
        <div className='md:pt-14 pt-6 pb-8 grid grid-flow-row md:grid-flow-col md:grid-cols-11 gap-y-6 md:gap-y-0 md:gap-x-4  nwp-container mx-auto'>
          <div className='col-span-2 -mt-6 '>
            <LogoCdsBlueWhite width={200} />
            <div className='w-full flex gap-x-4 mx-auto pl-2'>
              <a href='#'>
                <FacebookIcon className='fill-white w-12 h-12'/>
              </a>
              <a href='#'>
                <InstagramIcon className='fill-black w-12 h-12 hover:stroke-white stroke-white' />
              </a>
              <a href='#'>
                <YouTubeIcon className='fill-white w-12 h-12'/>
              </a>
            </div>
          </div>
          <div className='col-span-3 text-lg text-gray-200 nwp-container'>
            <h6 className='font-semibold text-cdsblue text-xl'>Contáctanos</h6>
            <div className='pt-4 flex flex-col gap-y-2'>
              <p>(507) 306-3700</p>
              <p>(507) 317-3799</p>
              <p>ciudaddelsaber@cdspanama.org</p>
            </div>
          </div>
          <div className='col-span-3 text-lg text-gray-200'>
            <h6 className='font-semibold text-cdsblue text-xl'>Visítanos</h6>
            <div className='pt-4 flex flex-col gap-y-2'>
              <p>Fundación Ciudad del Saber,
                  Edificio 104, Calle Luis Bonilla
                  Clayton, Panamá</p>
            </div>
          </div>
          <div className='col-span-3 text-lg text-gray-200'>
            <h6 className='font-semibold text-cdsblue text-xl'>Suscríbete al Newsletter</h6>
            <div className='pt-4 flex flex-col gap-y-2'>
              <p>Entérate de las novedades de la comunidad</p>
              <button className='px-4 py-3 w-40 font-semibold rounded-xl bg-white hover:bg-gray-200 duration-150 text-black'>Suscríbete</button>
            </div>
          </div>
        </div>
        <div className='hidden md:grid grid-cols-5 nwp-container gap-x-4 nwpcontainer mx-auto py-8 border-t border-zinc-800'>
          {menuOptions.map((option, index) => (
            <div key={index} className='col-span-1 text-lg text-gray-200'>
              <h6 className='font-semibold text-cdsblue text-xl'>{option.label}</h6>
              <div className='pt-4 flex flex-col gap-y-2'>
                {option.subOptions.map((subOption, subIndex) => (
                  <p key={subIndex}>
                    <a className='hover:text-white' href={subOption.url}>{subOption.label}</a>
                  </p>
                ))}
              </div>
            </div>
          ))}
        </div>
        <ul className='flex flex-col gap-y-4 nwp-container font-semibold py-4 md:hidden border-y border-zinc-800'>
          {menuOptions.map((option, index) => (
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
          <a className='underline text-white hover:text-white px-2' href="#">Mapa de sitio</a>
          <a className='underline text-white hover:text-white px-2' href="#">Términos y condiciones</a>
          <a className='underline text-white hover:text-white px-2' href="#">Política de cookies</a>
          <p className='text-white px-2'>© Copyright 2024. Todos los derechos reservados</p>      
        </div>
      </div>
    </div>
  );
}

const container = document.getElementById('nwp-footer');
if (container) {
  const root = createRoot(container);
  root.render(<NwpFooter />);
}
