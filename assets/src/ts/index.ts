import "bootstrap";
import { displayedByScrolling } from "./displayedByScrolling/displayedByScrolling";

// エントリーポイント
document.addEventListener('DOMContentLoaded', () => {
  displayedByScrolling({targetID:'js_returnToTopButton', threshold:500});
});
