import Splid from "@splidejs/splide";
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

type args = {
  splideRootClassName : string
}

export const carehomeCarousel = (args:args):void => {
  const { splideRootClassName } = args;
  // 対象要素が無ければ直ちに関数を抜ける。
  if (!document.getElementsByClassName(splideRootClassName)[0]) return;

  const carehomePhots = new Splid('.' + splideRootClassName, {
    type: "loop",
    perPage: 5,
    gap: 5,
    arrows: false,
    pagination: false,
    paginationDirection: 'rtl',
    autoScroll: {
      speed: 1.5,
      autoStart: true,
      rewind: false,
      pauseOnHover: true,
      pauseOnFocus: true,
    },
        mediaQuery: 'max',
    breakpoints: {
      1200: {
        perPage:4,
      },
      1024: {
        perPage:3.5,
      },
      768: {
        perPage: 3,
        autoScroll: {
          speed: 0.5,
        }
      },
      640: {
        perPage: 2,
        autoScroll: {
          speed: 0.5,
        }
      }
    },
  });
  // マウントを忘れないこと。
  carehomePhots.mount({ AutoScroll });
}
