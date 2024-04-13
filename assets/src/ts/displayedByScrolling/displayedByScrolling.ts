export const displayedByScrolling = (args:{ targetID: string, threshold: number }) => {
  const targetElement = document.getElementById(args.targetID);
  if (!targetElement) {
    return;
  }

  initializeState(targetElement);

  document.addEventListener('scroll', (e) => {
    if (window.scrollY > args.threshold) {
      appear(targetElement);
    } else {
      disappear(targetElement);
    }
  });
}
const initializeState = (targetElement:HTMLElement) => {
  targetElement.classList.add('d-none');
  // targetElement.style.transitionProperty = 'opacity';
  // targetElement.style.transitionDelay = '0s';
  // targetElement.style.transitionDuration = '1s';
  // targetElement.style.transitionTimingFunction = 'ease';
}

const appear = (targetElement:HTMLElement) => {
  targetElement.classList.add('d-block');
  targetElement.classList.remove('d-none');
}

const disappear = (targetElement:HTMLElement) => {
  targetElement.classList.add('d-none');
  targetElement.classList.remove('d-block');
}
