/**
 *
 * @param args { { toggleId: string, menuId: string } }
 * @returns
 */
export function drawerMenuToggle(args: { toggleId: string, menuId: string }): void {
  const { toggleId, menuId } = args;
  const toggle = document.getElementById(toggleId);
  const menu = document.getElementById(menuId);

  // トグルとメニューの両方が存在しないなら、直ちに処理を終了
  if (!toggle || !menu) return;

  const arg_set: toggleAndMenu = { toggle: toggle, menu: menu };

  // トグルアイコンをクリックすることにより、状態が変化
  toggle.addEventListener('click', () => {
    toggleStates(arg_set);
  });

  // リサイズによりメニュー閉鎖
  window.addEventListener('resize', () => {
    toCloseState(arg_set);
  });
}

type toggleAndMenu = {
  toggle: HTMLElement,
  menu: HTMLElement
};

const toggleStates = (args: toggleAndMenu) => {
  if (args.toggle.ariaExpanded === 'false') {
    toOpenState(args);
  } else {
    toCloseState(args);
  }
}

const toCloseState = (args: toggleAndMenu) => {
  const { toggle, menu } = args;
  fixScroll(false);
  toggle.ariaExpanded = 'false';
  menu.ariaHidden = 'true';
  menu.classList.add('d-none');
  menu.classList.remove('d-block');
}

const toOpenState = (args: toggleAndMenu) => {
  const { toggle, menu } = args;
  fixScroll(true);
  toggle.ariaExpanded = 'true';
  menu.ariaHidden = 'false';
  menu.classList.add('d-block');
  menu.classList.remove('d-none');
}

const fixScroll = (isFix: boolean) => {
  if (isFix) {
    document.body.style['overflow'] = 'hidden';
  } else {
    document.body.style['overflow'] = '';
  }
}
