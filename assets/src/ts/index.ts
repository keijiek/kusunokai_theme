import "bootstrap";
// import { appearHeaderMenuByScroll } from "./appearHeaderNav/appearHeaderNav";
import { drawerMenuToggle } from "./drawerMenu/drawerMenu";
// import { fixHeaderMenu } from "./appearHeaderNav/fixHeaderMenu";

// エントリーポイント
document.addEventListener('DOMContentLoaded', () => {
  // スクロールで登場するパネル
  // appearHeaderMenuByScroll({ menuId: 'js_headerNavPanel', menuClass:'ly_globalMenuWholePanel', threshold: 300 });
  // fixHeaderMenu({panelId: 'js_headerNavPanel', threshold: 300});
  // ハンバーガーアイコンとメニューに機能を付ける
  drawerMenuToggle({ toggleId: 'js_drawerIcon', menuId: 'js_drawerMenu' });
});
