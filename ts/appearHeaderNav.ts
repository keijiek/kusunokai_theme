export const appearHeaderMenuByScroll = (args: { menuId: string, menuClass:string, threshold: number }) => {
  const { menuId, menuClass, threshold } = args;
  const headerNav = document.getElementById(menuId);

  if (!headerNav) return;

  document.addEventListener('scroll', () => {
    checkScrollY({headerNav, menuClass, threshold});
  })
}

const checkScrollY = (args: { headerNav: HTMLElement, menuClass:string, threshold: number }) => {
  const { headerNav, menuClass, threshold } = args;

  if (window.scrollY > threshold) {
    appearHeaderNav({ headerNav, menuClass});
  } else {
    disappearHeaderNav({ headerNav, menuClass});
  }
}

const appearHeaderNav = (args: { headerNav: HTMLElement, menuClass: string }) => {
  const { headerNav, menuClass } = args;
  headerNav.classList.add(menuClass + '__appear');
}

const disappearHeaderNav = (args: { headerNav: HTMLElement, menuClass: string }) => {
  const { headerNav, menuClass } = args;
  headerNav.classList.remove(menuClass + '__appear');
}
