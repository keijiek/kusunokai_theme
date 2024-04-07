export const fixHeaderMenu = (panelId:string, threshold: number):void|Error => {
  const headerNav = document.getElementById(panelId)!;
  if (!headerNav) {
    return new Error();
  }

  document.addEventListener('scroll', (e: Event) => {
    if (window.scrollY > threshold) {
    // headerNav.classList.add('position-fixed','top-0', 'start-0');
    headerNav.classList.add('position-fixed');
  } else {
    headerNav.classList.remove('position-fixed');
  }
  })
}
