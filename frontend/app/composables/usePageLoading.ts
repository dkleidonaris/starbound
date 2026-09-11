export const usePageLoading = () => {
  const loading = useState<boolean>("page-loading", () => true);
  return loading;
};
