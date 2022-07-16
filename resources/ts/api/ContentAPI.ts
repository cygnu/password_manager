import axios from 'axios'
import { Content } from '../types/Content'

const getContents = async () => {
  const { data } = await axios.get<Content[]>('api/contents')
  return data
}

export { getContents }
