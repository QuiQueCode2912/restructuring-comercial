import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { EffectCoverflow, Pagination } from 'swiper/modules'; // Importa los módulos necesarios
import 'swiper/css'; // Estilos básicos de Swiper
import 'swiper/css/effect-coverflow'; // Estilos para el efecto Coverflow
import 'swiper/css/pagination'; // Estilos para la paginación

export const NwpGallerySection = ({ backgroundImage, title, carouselImages }) => {
  return (
    <section 
      className="relative nwp-padding-x-container bg-cover bg-center z-10 h-[480px] md:h-auto" 
      style={{ backgroundImage: `url('${backgroundImage}')` }}
    >
      <div className="absolute inset-0 bg-black opacity-80"></div>
      <div className="relative nwp-container z-10 mx-auto py-20">
        <h6 className="w-full text-center text-white font-bold text-3xl md:text-5xl pb-8">{title}</h6>
        <div className="swiper-container">
          <Swiper
            effect={'coverflow'}
            grabCursor={false}
            centeredSlides={true}
            slidesPerView={'auto'}
            coverflowEffect={{
              rotate: 0,
              stretch: 10,
              depth: 500,
              modifier: 2,
              slideShadows: false,
            }}
            pagination={false}
            modules={[EffectCoverflow, Pagination]} // Asegúrate de incluir los módulos
            breakpoints={{
              // Configuración para pantallas pequeñas
              640: {
                slidesPerView: 1,
                spaceBetween: 100,
                coverflowEffect: {
                  stretch: 5,
                  depth: 10,
                },
              },
              // Configuración para pantallas medianas
              768: {
                slidesPerView: 2,
                spaceBetween: 20,
                coverflowEffect: {
                  stretch: 10,
                  depth: 400,
                },
              },
              // Configuración para pantallas grandes
              1024: {
                slidesPerView: 'auto',
                spaceBetween: 30,
                coverflowEffect: {
                  stretch: 10,
                  depth: 500,
                },
              },
            }}
            className="mySwiper"
          >
            {carouselImages.map((imageData, index) => (
              <SwiperSlide key={index} style={{ maxWidth: '690px', maxHeight: '440px' }}>
                <div className='w-full h-60 md:h-[440px] relative mr-4 md:mr-0'>
                  <div className="absolute bottom-0 left-0 right-0 p-4 text-white z-20">
                    <h3 className="font-bold text-lg">{imageData.title}</h3>
                    <p className="text-sm">{imageData.description}</p>
                  </div>
                  <div className="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent z-10"></div>
                  <img className='h-full object-cover' src={imageData.image} alt={`Slide ${index + 1}`} style={{ width: '100%' }} />
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>
      </div>
    </section>
  );
};

