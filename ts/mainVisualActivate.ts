import Splid from "@splidejs/splide";

type args = {
  mainVisualSplideRootClassName : string
}

/**
 * カルーセルの設定。下記URLは各項目の解説
 * https://ja.splidejs.com/guides/options/
 *
 * @param args args
 * @return void
 */
export function mainVisualActivate(args: args): void {
  const { mainVisualSplideRootClassName } = args;
  // 対象要素が無ければ直ちに関数を抜ける。
  if (!document.getElementsByClassName(mainVisualSplideRootClassName)[0]) return;

  // 対象となるメインビジュアル要素を捉えてカルーセル化する Splide の設定。
  const mainVisual = new Splid('.'+mainVisualSplideRootClassName, {
    // slide, loop, fade
    type: "fade",
    perPage: 1,
    rewind: true,
    speed: 4000,
    rewindByDrag: true,
    arrows: false,
    pagination: false,
    paginationDirection:'ltr',
    paginationKeyboard: true,
    autoplay: true,
    interval: 8000,
    pauseOnHover: false,
    easing: 'ease-out',
  });

  // 上記の設定で実行。
  mainVisual.mount();
}
