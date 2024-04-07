import { mainVisualActivate } from './mainVisualActivate';
import { carehomeCarousel } from './carehomeCarousel';
import { hambrugerToggle } from './hambrugerMenu';
import { appearHeaderMenuByScroll } from './appearHeaderNav';
import ScrollHint from 'scroll-hint';

/**
 * エントリーポイント。
 * この index.ts は、import した関数やクラスを、下記エントリーポイントで実行するだけのファイル。
 * この index.ts に、関数やクラスを定義しないこと！
 */
document.addEventListener('DOMContentLoaded', () => {
  // メインビジュアルのカルーセルを活性化
  mainVisualActivate({ mainVisualSplideRootClassName: 'js_mainvisualSplide' });

  // ケアホーム
  carehomeCarousel({ splideRootClassName: 'js_carehome_carousel' });

  // ハンバーガーアイコンとメニューに機能を付ける
  hambrugerToggle({ toggleId: 'js_hambrugerIcon', menuId: 'js_hambrugerMenu' });

  // スクロールによるヘッダーナヴィの登場
  appearHeaderMenuByScroll({ menuId: 'js_menuAppearByScroll', menuClass: 'ly_menuAppearByScroll', threshold: 300 });

  // ScrollHint の設定。用いるクラス名を定義
  new ScrollHint('.js_scrollable');
})
