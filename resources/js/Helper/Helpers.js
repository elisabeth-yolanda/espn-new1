
export function formatDate(datestring) {
    return new Date(datestring).toLocaleDateString("id-ID", {
      year: "numeric",
      month: "long",
      day: "numeric",
    });
}

export function parseHtml(str) {
    return str.replace(/<(.|\n)*?>/g, '');
}
