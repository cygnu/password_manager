import { useQuery } from 'react-query'
import * as api from '../api/ContentAPI'

const useContents = () => {
  return useQuery('contents', () => api.getContents())
}

export { useContents }
