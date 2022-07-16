import axios from 'axios'
import { Content } from '../types/Content'

const getContents = async () => {
  const data: { data: Array<Content> } = await axios.get<Array<Content>>('api/contents')
  return data
}

export { getContents }
