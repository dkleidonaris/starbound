export function excerptFromHtml(html, maxLength = 150) {
  if (!html) return "";
  // Strip HTML tags
  const text = html.replace(/<[^>]*>/g, "");
  // Trim to desired length
  if (text.length <= maxLength) return text;
  return text.slice(0, maxLength).trim() + "…";
}
